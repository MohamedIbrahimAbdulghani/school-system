<?php

namespace App\Repository;

interface ParentRepositoryInterface {
    public function index();
    public function create();
    public function store($request);
    public function update($request, $id);
    public function destroy($id);
    public function validateField($request);
    public function bulkDestroy($request);
    public function uploadParentAttachments($request, $id);
    public function deleteParentAttachments($id);
    public function downloadParentAttachment($id);
    public function previewParentAttachment($id);
}
