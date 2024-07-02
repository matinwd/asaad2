<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait VisibilityChangerTrait{

    public function toggleHide($id)
    {
        $model = $this->repository->find($id);

        $model->visibility = $model->visibility == 1 ? '0' : '1';
        $model->save();

        $model = Str::replace('Controller','',class_basename(get_class($this)));

        flash()->success($model . ' Visibility Changed.');

        return redirect()->route('admin.' . Str::lower(Str::plural($model)) . '.index')->with('message', Str::replace(class_basename(get_class($this)),'Controller','') . ' Changed.');
    }
}
