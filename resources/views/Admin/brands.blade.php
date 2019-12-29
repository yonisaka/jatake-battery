@extends('layout.dashboard_v2')
@section('content')

<div class="row-fluid">
    <div class="span12">
      <div class="grid simple ">
        <div class="grid-title">
          <h4>Table <span class="semi-bold">Styles</span></h4>
          <div class="tools">
            <a href="javascript:;" class="collapse"></a>
            <a href="javascript:;" class="reload"></a>
          </div>
        </div>
        <div class="grid-body ">
          <table class="table table-hover table-condensed" id="brands-datatable">
            <thead>
              <tr>
                <th style="width:1%">
                  <div class="checkbox check-default" style="margin-right:auto;margin-left:auto;">
                    <input type="checkbox" value="1" id="checkbox1">
                    <label for="checkbox1"></label>
                  </div>
                </th>
                <th style="">Brand Name</th>
                <th style="">Description</th>
                <th style="">Logo</th>
                <th style="">Action</th>
                {{-- <th style=""></th> --}}
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>

@endsection

@section('script')
    <script src="/custom/brands-index.js" type="text/javascript" defer></script>
@show
