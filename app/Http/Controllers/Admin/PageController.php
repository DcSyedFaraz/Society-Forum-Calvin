<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AboutDocument;
use DB;
use Illuminate\Http\Request;
use Validator;
use App\Models\PageCategory;
use Carbon\Carbon;

class PageController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:pages-list|pages-create|pages-edit|pages-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:pages-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:pages-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:pages-delete', ['only' => ['destroy']]);
        $this->middleware('permission:pages-show', ['only' => ['show']]);

    }
    public function index()
    {
        $data['pages'] = PageCategory::get();
        return view('admin.homepage', $data);
    }
    public function about_document(Request $request)
    {
        $request->validate([
            'document' => 'required|max:4096',
        ]);

        DB::beginTransaction();

        try {
            if ($request->file('document')) {
                $file = $request->file('document');
                $path = $file->store('about_documents', 'public');

                AboutDocument::create([
                    'file_name' => $file->getClientOriginalName(),
                    'file_path' => $path,
                ]);

                DB::commit();

                return redirect()->back()->with('success', 'Document uploaded successfully.');
            } else {
                return back()->with('error', 'Please upload a valid document.');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
            return back()->with('error', 'An error occurred while uploading the document.');
        }
    }
    public function update(Request $request, $id)
    {
        $page = PageCategory::find($id);
        $page->page_name = $request->page_name;
        $page->updated_at = Carbon::now();
        $page->save();
        return redirect()->back()->with(['success' => 'Record Updated Successfully']);

    }
    public function destroy($id)
    {
        $page = PageCategory::find($id)->delete();
        return redirect()->back()->with(['success' => 'Record Deleted Successfully']);

    }
}
