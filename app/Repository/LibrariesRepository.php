<?php

namespace App\Repository;

use App\Models\Grades;
use App\Models\Library;
use Illuminate\Support\Facades\Storage;

class LibrariesRepository implements LibrariesRepositoryInterface {
    public function index() {
        $libraries = Library::all();
        return view('pages.Libraries.index', compact('libraries'));
    }

    public function create() {
        $grades = Grades::all();
        return view('pages.Libraries.create', compact('grades'));
    }

    public function show($id) {

    }

    public function store($request) {
        try {
            $file = $request->file('file_name');
            $name = $file->getClientOriginalName();

            $library = Library::create([
                'title' => $request->title,
                'file_name' => $name,
                'grade_id' => $request->grade_id,
                'classroom_id' => $request->classroom_id,
                'section_id' => $request->section_id,
                'teacher_id' => '1'
            ]);
            // if library created in database store file in local storage
            $file->storeAs('attachments/libraries/' . $library->title, $name, 'upload_attachments');
            toastr()->success(trans('messages.success'));
            return redirect()->route('libraries.index');
        } catch(\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id) {
        $library = Library::findOrFail($id);
        $grades = Grades::all();
        return view('pages.Libraries.edit', compact('library', 'grades'));
    }


    public function update($request)
    {
        try {
            $library = Library::findOrFail($request->id);

            // Old and new title
            $oldTitle = $library->title;
            $newTitle = $request->title;

            // Old folder path
            $oldFolderPath = 'attachments/libraries/' . $oldTitle;

            // New folder path
            $newFolderPath = 'attachments/libraries/' . $newTitle;

            // If User uploaded a new file
            if ($request->hasFile('file_name')) {
                $file = $request->file('file_name');
                $newFileName = $file->getClientOriginalName();

                // Delete old file
                if ($library->file_name) {
                    $oldFilePath = $oldFolderPath . '/' . $library->file_name;
                    if (Storage::disk('upload_attachments')->exists($oldFilePath)) {
                        Storage::disk('upload_attachments')->delete($oldFilePath);
                    }
                }

                // Create new folder if title changed
                if ($oldTitle !== $newTitle) {
                    if (Storage::disk('upload_attachments')->exists($oldFolderPath)) {
                        Storage::disk('upload_attachments')->move($oldFolderPath, $newFolderPath );
                    }
                }

                // Upload new file
                $file->storeAs( $newFolderPath, $newFileName, 'upload_attachments' );

                // Update file name
                $library->file_name = $newFileName;
            }

            //  If Title changed but no new file
            elseif ($oldTitle !== $newTitle) {

                if (Storage::disk('upload_attachments')->exists($oldFolderPath)) {

                    Storage::disk('upload_attachments')->move(
                        $oldFolderPath,
                        $newFolderPath
                    );
                }
            }

            $library->update([
                'title' => $newTitle,
                'file_name' => $library->file_name,
                'grade_id' => $request->grade_id,
                'classroom_id' => $request->classroom_id,
                'section_id' => $request->section_id,
                'teacher_id' => '1'
            ]);

            toastr()->success(trans('messages.success'));

            return redirect()->route('libraries.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id) {
        try {
            $library = Library::findOrFail($id);
            // Folder path
            $filePath = 'attachments/libraries/' . $library->title ;

            // Delete folder from my local storage
            if (Storage::disk('upload_attachments')->exists($filePath)) {
                Storage::disk('upload_attachments')->deleteDirectory($filePath);
            }
            $library->delete();
            toastr()->success(trans('messages.delete'));
            return redirect()->route('libraries.index');
        } catch(\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function download($id) {
        $library = Library::findOrFail($id);
        return response()->download(public_path('attachments/libraries/' . $library->title . '/' . $library->file_name));
    }
}