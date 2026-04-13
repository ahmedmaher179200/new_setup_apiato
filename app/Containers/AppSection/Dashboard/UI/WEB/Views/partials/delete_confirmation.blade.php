<div class="modal-body">
  <p>{{ trans('dashboard.Are you sure about this procedure') }}</p>
</div>
<div class="modal-footer justify-content-between">
  <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('dashboard.Cancel') }}</button>
  <a class="btn btn-default" href="{{$url}}">{{ trans('dashboard.delete') }}</a>
</div>