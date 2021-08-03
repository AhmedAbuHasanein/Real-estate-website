<?php

namespace App\Http\Controllers\ Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentCompanyController extends Controller
{
    /**
     * @param $id
     * @return
     */
    //delete document
    public function delete($id){
        $document_company = Auth::user()->company->company_documents->find($id);

        if($document_company == null){
            return redirect()->back();
        }else {
            $document_company->delete();
            return redirect()->back()->with(['success' => 'تمت عملية حذف المستند بنجاح !']);
        }
    }
}
