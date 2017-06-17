<button	 class="green_btn_header"
  data-target="#myModal"
  data-toggle="modal" 
  type="button" 
  style="cursor:pointer;font-size:24px; border:none;">+
</button>
<div id="root">
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Add Aed</h4>
        </div>
        <form action="/pending-aeds" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="modal-body">
              <div v-show="isStepOne">
                @include('front.component.stepOne')
              </div>
              <div v-show="isStepTwo">
                @include('front.component.stepTwo')
              </div>
              <div v-show="isStepThree">
                @include('front.component.stepThree')
              </div>
          </div>
          <div class="modal-footer">
            <div v-show="isStepOne">
                <button  type="button" class="theme-btn btn-style-four pull-right" @click="showStepTwo">next</button>
            </div>        
            <div v-show="isStepTwo">
                <button  type="button" class="theme-btn btn-style-four pull-right" @click="showStepThree">next</button>
                <button  type="button" class="theme-btn btn-style-four pull-right" @click="showStepOne">preview</button>
            </div>        
            <div v-show="isStepThree">
                <button  type="submit" class="theme-btn btn-style-four pull-right">submit</button>
            </div>
          </div>
          </form>
      </div>
    </div>
  </div>
</div>