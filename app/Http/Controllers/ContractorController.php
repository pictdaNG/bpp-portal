<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Contractor\ContractorContract;
use App\Repositories\Director\DirectorContract;
use App\Repositories\OwnershipStructure\OwnershipStructureContract;
use App\Repositories\Countries\CountriesContract;
use App\Repositories\ContractorCategory\ContractorCategoryContract;
use App\Repositories\BusinessCategory\BusinessCategoryContract;
use App\Repositories\BusinessSubCategory1\BusinessSubCategoryContract;
use App\Repositories\BusinessSubCategory2\BusinessSubCategory2Contract;
use App\Repositories\ContractorPersonnel\ContractorPersonnelContract;
use App\Repositories\ContractorJobs\ContractorJobsContract;
use App\Repositories\ContractorFinance\ContractorFinanceContract;
use App\Repositories\Equipments\EquipmentContract;
use App\Repositories\CompanyOwnership\CompanyOwnershipContract;
use App\Repositories\Qualifications\QualificationContract; 
use App\Repositories\ContractorMachinery\ContractorMachineryContract;
use App\Repositories\CategoryFee\CategoryFeeContract; 
use App\Repositories\PDFCertificateName\PDFCertificateNameContract; 
use App\Repositories\Compliance\ComplianceContract;
use App\Repositories\Advert\AdvertContract;





use App\ContractorFile;
use App\User;
use PDF;

//use Illuminate\Events\Dispatcher;

class ContractorController extends Controller {
    protected $repo;
    protected $directorRepo;
    protected $contractorCategory;
    protected $ownerhip;
    protected $county;
    protected $business_cate;
    protected $business_cate1;
    protected $business_cate2;
    protected $contract_personnel;
    protected $contract_job;
    protected $contractFinance;
    protected $equipment;
    protected $ownership;
    protected $qualification;
    protected $machinery;
    protected $contract_fee;
    protected $contract_pdf;
    protected $contract_compliance;
    protected $contract_advert;


    public function __construct(ContractorContract $contractorContract, DirectorContract $directorContract,
                 ContractorCategoryContract $contractorCategoryContract, OwnershipStructureContract $ownershipStructure, 
                 CountriesContract $country,  BusinessCategoryContract $businessCategory, BusinessSubCategory2Contract $businessCategory2,
                  ContractorJobsContract $contractorJob, BusinessSubCategoryContract $businessCategory1, ContractorPersonnelContract $contractorPersonnel,
                  ContractorFinanceContract $contractorFinanceContract, EquipmentContract $equipmentsContract , CompanyOwnershipContract $companyOwnership ,
                  QualificationContract $qualificationContract, ContractorMachineryContract $contractorMachinery, CategoryFeeContract $categoryFeeContract,
                  PDFCertificateNameContract $pdfCertificateName, ComplianceContract $complianceContract, AdvertContract $advertContract ) {
                  
                    

        $this->middleware('auth');
        $this->repo = $contractorContract;
        $this->directorRepo = $directorContract;
        $this->contractorCategory = $contractorCategoryContract;
        $this->ownership = $ownershipStructure;
        $this->county = $country;
        $this->business_cate = $businessCategory;
        $this->business_cate1 = $businessCategory1;
        $this->contract_personnel = $contractorPersonnel;
        $this->contract_job = $contractorJob;
        $this->business_cate2 = $businessCategory2;
        $this->contractFinance = $contractorFinanceContract;
        $this->equipment = $equipmentsContract;
        $this->tcc_ownership = $companyOwnership;
        $this->qualification = $qualificationContract;
        $this->machinery = $contractorMachinery;
        $this->contract_fees = $categoryFeeContract;
        $this->contract_pdf = $pdfCertificateName;
        $this->contract_compliance = $complianceContract;
        $this->contract_advert = $advertContract;

    }
    
    
    public function registration(Request $request){
         $user = $this->repo->getUserById();
         $directors = $this->directorRepo->getCompanyDirectors();
         $categories = $this->contractorCategory->getCategoriesById();
         $owner_ship = $this->ownership->listOwnershipStructure();
         $countries = $this->county->allCountries();
         $b_categories = $this->business_cate->allBusinessCategories();
         $b_categories1 = $this->business_cate1->allBusinessSubCategory();
         $personnels = $this->contract_personnel->getPersonnelsById();
         $jobs =$this->contract_job->getJobsById();
         $b_categories2= $this->business_cate2->allBusinessSubCategory();
         $finances = $this->contractFinance->getFinancesById();
         $equipments = $this->equipment->listEquipments();
         $tcc_ownerships = $this->tcc_ownership->listCompanyOwnership();
         $qualifications = $this->qualification->listQualifications();
         $machineries = $this->machinery->getMachineriesById();
         $fees = $this->contract_fees->listAllFee();
         $company = $this->repo->getCompanyById();
         $compliance = $this->contract_compliance->getCompliancesById();

        return view('contractor/registration', ['user' => $user, 'directors' => $directors, 
        'contractorcategories' =>  $categories, 'ownerships' => $owner_ship,
        'countries' => $countries, 'allcategories' => $categories, 'contractorcategories' =>  $categories,
        'business_cates' => $b_categories, 'business_cates1' => $b_categories1,  'personnels' => $personnels,
        'jobs' => $jobs, 'business_cates2' => $b_categories2, 'finances' => $finances, 'equipments' => $equipments,
        'fees' => $fees, 'company' => $company, 'compliance' => $compliance,
        'tcc_ownerships' => $tcc_ownerships, 'qualifications' => $qualifications, 'machineries' => $machineries,
        'cac' => ContractorFile::where('name', 'cac')->where('user_id', $user->id)->first(),
        'tcc' => ContractorFile::where('name', 'tcc')->where('user_id', $user->id)->first(),
        'tin' => ContractorFile::where('name', 'tin')->where('user_id', $user->id)->first(),
        'pencom' => ContractorFile::where('name', 'pencom')->where('user_id', $user->id)->first(),
        'itf' => ContractorFile::where('name', 'itf')->where('user_id', $user->id)->first(),
        'audited_account' => ContractorFile::where('name', 'audited_account')->where('user_id', $user->id)->first(),
        'swon_affidavit' => ContractorFile::where('name', 'swon_affidavit')->where('user_id', $user->id)->first(),
        'placcima' => ContractorFile::where('name', 'placcima')->where('user_id', $user->id)->first(),
        ]);

       
    }


    public function storeContractor(Request $request) {

       try {
           $contractor = $this->repo->createContractor((object)$request->all());
             
           if ($contractor) {
                $notification = array(
                    'message' => 'Game Added successfully',
                    'alert-type' => 'success'
                );
               return response()->json(['success'=>'Added new records.'], 200);
               
            } else {
            
                return response()->json(['responseText'=> 'error ocurred'], 500);
            }
       } catch (QueryException $e) {
        return response()->json(['response' => $e->getMessage()], 500);
       }
    }


    public function reportsContractor() {
        echo("contracts reports data table");
        return view('contractor.reports');
    }

    public function getDocumentsByUserId(){
        return ContractorFile::where('user_id',  Auth::user()->id)->get();

    }

    public function uploadContractorFile(Request $request){
        //Upload file return file name. associate file on storage with user_id
        $user = Auth::user();
        $name = $request->input('name');
        $cf = ContractorFile::where('user_id', $user->id)->where('name', $name)->first();
        if(!$cf){
            $cf = new ContractorFile;
            $cf->user_id = $user->id;
        }
        
        $file = $request->file('file');
        $mimeType = $file->getMimeType();
        $fileSize = $file->getSize();
        $destinationPath = 'uploads';
        $newFilePath = "C-" .$user->id . "-" .$file->getClientOriginalName();
        $displayName = $newFilePath;

        $cf->mime_type = $mimeType;
        $cf->size = $fileSize;
        $cf->name = $name;
        $cf->key = $displayName;
        if($file->move($destinationPath, $newFilePath)){
            $cf->save();
            return response()->json($cf, 200);
        }
        return response()->json(['status' => 'failure'], 400);
    }
    
    public function deleteContractorFile(Request $request){
        $user = Auth::user();
        $cf = ContractorFile::where('name', $request->input('name'))->where('user_id', $user->id)->first();
        $cf->delete();
        return response()->json(['status' => 'success'], 200);
    } 

    public function getContractorFile() {
        $user = Auth::user();
        $getUploadfiles = ContractorFile::where('name', $request->input('name'))->where('user_id', $user->id)->first();
        return view('admin/contractors_preview', ['getUploadfiles' => $getUploadfiles]);
    }

    public function downloadPDF($certification, $category ){
        $user = User::where('id', Auth::user()->id)->get()->first();
        $pdf = PDF::loadView('contractor/pdf', compact('user'), ['certification' => $certification,  'category' => $category, ]);
        return $pdf->download('irr.pdf');
      }

    public function getIRR(){
        $names = $this->contract_pdf->listAllPDFName();

        return view('contractor.partials.IrrDocs', ['names' => $names]);
    }


    public function getAdvertById($advertId) {
        $advert = $this->contract_advert->getAdsById($advertId);
       // dd($advert);
        return view('contractor.SelectBid')->with(['advert' => $advert]);
    }


    public function getAdverts() {
        $adverts = $this->contract_advert->listAllAdvertsForContractor();
       // dd($advert);
       session()->set('success', 'Item created successfully.');
        return view('contractor.AdvertList')->with(['adverts' => $adverts]);
    }

}
