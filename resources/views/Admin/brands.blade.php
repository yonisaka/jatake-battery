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
                <th style="width:10%">Project Name</th>
                <th style="width:22%" data-hide="phone,tablet">Description</th>
                <th style="width:6%">Price</th>
                <th style="width:10%" data-hide="phone,tablet">Progress</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="v-align-middle">
                  <div class="checkbox check-default">
                    <input type="checkbox" value="3" id="checkbox2">
                    <label for="checkbox2"></label>
                  </div>
                </td>
                <td class="v-align-middle">Early Bird</td>
                <td class="v-align-middle"><span class="muted">Redesign project template</span></td>
                <td><span class="muted">$4,500</span></td>
                <td class="v-align-middle">
                  <div class="progress ">
                    <div data-percentage="80%" class="progress-bar progress-bar-success animate-progress-bar"></div>
                  </div>
                </td>
              </tr>
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
