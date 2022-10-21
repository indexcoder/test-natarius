<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\NotaryResource;
use App\Http\Resources\NotaryCollection;
use App\UseCases\Notary\NotaryService;
use App\Http\Requests\Notary\CreateRequest;


class NotaryController extends Controller {

    private $service;

    public function __construct(NotaryService $service) {
        $this->service = $service;
    }

    public function index() {
        $userId = (int) request()->cookie('id');
        $messages = $this->service->getNotaryMessages($userId);
        return new NotaryCollection($messages);
    }

    public function store(CreateRequest $request) {
        try {
            $userId = (int) $request->cookie('id');
            $message = $this->service->createNotaryMessages($userId, $request);
            return new NotaryResource($message);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

    }

}
