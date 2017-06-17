<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label for="street" class="label-control">Name</label>
      <input type="text" class="form-control" id="aedname" name="aedname"/>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label for="num" class="label-control">Model</label>
      <input type="text" class="form-control" id="model" name="model"/>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-10">
  <div class="form-group">
      <label for="num" class="label-control">Adresse</label>
            <input id="locationField" type="text" class="form-control" placeholder="Location" name="street" value="{{Session::has('research') ? Session::get('research')['location'] : ''}}">

      </div>
</div>

<div class="col-md-2" style="margin-top: 25px;">
    <button type="button" class="loc-btn btn btn-default" id="defineLocBrowser" data-toggle="tooltip" data-placement="bottom" title="Share my location" style="display: {{!Session::has('research') || Session::get('research')['location'] == '' ? 'block' : 'none'}};"><i class="fa fa-map-marker fa-2"></i></button>


    <button type="button" class="btn loc-btn btn-default loc-reset removeLocation" style="display: {{!Session::has('research') || Session::get('research')['location'] == '' ? 'none' : 'block'}};"><i class="fa fa-times"></i></button>
</div>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="form-group">
        <label for="pos_long" class="label-control">Longitude</label>
        <input type="text" class="form-control" id="pos_long" name="pos_long"  readonly="readonly" />
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
        <label for="pos_lat" class="label-control">Latitude</label>
        <input type="text" class="form-control" id="pos_lat" name="pos_lat"  readonly="readonly" />
    </div>
  </div>
</div>

<div class="row">
  <div class="form-group col-md-6 col-sm-6 col-xs-12">
      <div class="field-label">AED Expiration </div>
      <input type='text' class="form-control" id='datetimepicker4'  name="start_date"/>
  </div>
</div>
