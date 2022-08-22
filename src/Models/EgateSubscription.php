<?php

namespace Egately\NovaManassaSdk\Models;


use Egately\NovaManassaSdk\NovaManassaSdk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Sushi\Sushi;

class EgateSubscription extends Model
{
    use Sushi;

    public function getRows()
    {
        return $this->ImportRows();
    }

//    protected function sushiShouldCache()
//    {
//        return false;
//    }
//
//    protected function sushiCacheReferencePath()
//    {
//        $stg = storage_path('app/manassa');
//
//        if (file_exists($stg)) {
//            'yes';
//        } else {
//            'no';
//        }
//        return storage_path('app/') . 'table.csv';
//    }


    public function ImportRows()
    {
        $account = auth()->user()?->manassaAccount?->manassa_id ?? Null;
        if ($account != null) {
            $data = ['account_id' => auth()->user()->manassaAccount->manassa_id];
            $Rows = app(NovaManassaSdk::class)->syncSubscritions($data);
            Log::info('ImportRows', [$Rows]);
            if (isset($Rows['data'])) {
                return $Rows['data'];
            }
            return [];
        } else {
            return [];
        }
    }


}
