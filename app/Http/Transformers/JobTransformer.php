<?php
/**
 * Created by PhpStorm.
 * User: nenad
 * Date: 22.2.19.
 * Time: 21.03
 */

namespace App\Http\Transformers;

use App\Job;
use League\Fractal\TransformerAbstract as Transformer;

class JobTransformer extends Transformer
{
    public function transform($job)
    {
        return [
            'id'      => (int) $job->id,
            'title'   => $job->title,
            'desc'    => $job->descriptioin,
            'email'   => $job->email
        ];
    }
}