<div class="banner" style="margin-left: 15px;">
  <div class="container">
    <div class="row m-0">
      <div class="col-md-3"></div>
      <div class="col-md-9 p-0" style="">

		    <div class="row" style="margin-top: 10px;">
          <div class="col-xs-12">
            <div class="heading-part heading-bg mb-30">
              <h2 class="heading m-0">Corporate Client</h2>
            </div>
          </div>
        </div>

        <style type="text/css">
          th{
            color: #000;
            text-align: center;
          }
          td{
            color: #0D2B80;
            font-weight: bolder;
          }
        </style>

		    <div class="row" style="">
          <div class="col-xs-12" style="margin-top: -20px;">
              <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                         <th>Company Name</th>
                         <th>Details</th>
                         <th>Logo</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php 
                        if (isset($fatchClient)) :
                            foreach ($fatchClient as $data) :
                     ?>

                        <tr>
                             <td style="width: 150px; text-align: center; font-size: 15px; "><?php echo $data->name; ?> </td>

                              <td style="width: 150px; text-align: center; font-size: 15px; "><?php echo $data->details; ?> </td>

                              <td style="width: 100px; text-align: center; font-size: 15px; ">
                                <img style="width:60px; height: 50px;" src="<?php echo base_url(); ?>libs/upload_pic/Corporate_logo/<?php echo $data->pic; ?>">
        
                              </td>

                        </tr>


                        <?php
                        endforeach;
                        endif;
                        ?>

                    </tbody>
                </table>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>