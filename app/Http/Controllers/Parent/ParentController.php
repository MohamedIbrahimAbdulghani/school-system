<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Models\Nationality;
use App\Models\TypeBlood;
use App\Models\Religion;
use Illuminate\Http\Request;
use App\Http\Requests\StoreParentRequest;
use App\Http\Requests\UploadAttachments;
use App\Models\MyParent;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Repository\ParentRepositoryInterface;


class ParentController extends Controller
{
    protected $parent;

    public function __construct(ParentRepositoryInterface $parent)
    {
        $this->parent = $parent;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->parent->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->parent->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreParentRequest $request)
    {
        return $this->parent->store($request);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->parent->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->parent->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreParentRequest $request, string $id)
    {
        return $this->parent->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return $this->parent->destroy($id);
    }
    // this function to make realtime validation about add_parent
    public function validateField(Request $request) {
        return $this->parent->validateField($request);
    }

    // this is function to delete all parents
    public function bulkDestroy(Request $request) {
        return $this->parent->bulkDestroy($request);
    }

    // this is function to upload photo for parents or to upload attachments for parents
        public function uploadParentAttachments(UploadAttachments $request, $id) {
            return $this->parent->uploadParentAttachments($request, $id);
    }
// this is function to delete photo for  attachments for students
    public function deleteParentAttachments($id) {
        return $this->parent->deleteParentAttachments($id);
    }

    // this is function to download photo for  attachments for parents
    public function downloadParentAttachment($id) {
        return $this->parent->downloadParentAttachment($id);
    }
    // this is function to preview photo for  attachments for parents
    public function previewParentAttachment($id) {
        return $this->parent->previewParentAttachment($id);
    }
}
