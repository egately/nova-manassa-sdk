<?php

namespace Egately\NovaManassaSdk\Models;


use Egately\NovaManassaSdk\NovaManassaSdk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Sushi\Sushi;

class EgateSubscription extends Model
{
    use Sushi;

    public function getRows()
    {
        return $this->ImportRows();
    }

    protected function sushiShouldCache()
    {
        return true;
    }

    protected function sushiCacheReferencePath()
    {

        return storage_path('app/manassa/tables').'/table.csv';
    }


    public function ImportRows()
    {
        if(auth()->user()->manassaAccount->manassa_id == null) {
            $data = ['account_id' =>auth()->user()->manassaAccount->manassa_id];
            $Rows = app(NovaManassaSdk::class)->syncSubscritions($data);
            Log::info('ImportRows', [$Rows]);
            if(isset($Rows['data'])) {
                return $Rows['data'];
            }
            return [];
        }else {
          return [];
        }
    }



}
