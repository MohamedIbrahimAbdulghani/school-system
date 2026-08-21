<?php

namespace App\Repository;

use App\Models\Question;

class QuestionsRepository implements  QuestionsRepositoryInterface {
    public function index() {
        $questions = Question::all();
        return view('pages.Questions.index', compact('questions'));
    }

    public function create() {
        return "create function";
    }

    public function show($id) {
        return "show function";
    }

    public function store($request) {
        return "store function";
    }

    public function edit($id) {
        return "edit function";
    }

    public function update($request) {
        return "update function";
    }

    public function destroy($id) {
        return "destroy function";
    }
}
