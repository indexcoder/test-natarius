<?php
namespace App\UseCases\Notary;

use App\Models\User;
use App\Models\Notary;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Notary\CreateRequest;

class NotaryService {

    public function getNotaryMessages($userId) {
        return Notary::where('user_id', $userId)->latest()->paginate(3)->withQueryString();
    }

    public function createNotaryMessages($userId, CreateRequest $request) {

        /** @var User $user */
        $user = User::findOrFail($userId);

        return DB::transaction(function () use ($request, $user) {
            /** @var Notary $notary */
            $notary = Notary::make([
                   'user_id' => $user->id,
                   'name' => $request['name'],
                   'last_name' => $request['last_name'],
                   'email' => $request['email'],
                   'receipt_date' => $request['receipt_date'],
                   'record_type' => $request['record_type'],
            ]);
            $notary->saveOrFail();
            return $notary;
        });
    }
}
