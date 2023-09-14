<style>

.rating { 
    border: none;
    float: unset;
    width: 200px;
}

.rating > input { display: none; } 
.rating > label:before { 
  margin: 5px;
  font-size: 30px;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > .half:before { 
  content: "\f089";
  position: absolute;
}

.rating > label { 
  color: #ddd; 
 float: right; 
}


.rating > input:checked ~ label, /* show gold star when clicked */
.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { color: #FFED85;  }

input, label {
  cursor: pointer;
}
</style>
<div class="modal fade" id="modal-issue-detail">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Issue Detail</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <b>Created Date : </b> <?= date('d/m/Y', strtotime($detail->row()->created_at)) ?> <br>
                                <b>Assign to Dept : </b> <?= $detail->row()->assign_to_depart_name ?> <br>
                                <b>Assign to Pic : </b> <?= ucfirst(strtolower($detail->row()->assign_to_pic_name)) ?> <br>
                                <b>Status : </b> <?= $detail->row()->status_name ?> <br><br>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                            <label for="">Penilaian</label>               
                            <fieldset class="rating">
                                <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="5 stars"></label>
                                <input type="radio" id="star4half" name="rating" value="4.5" /><label class="half" for="star4half" title="4.5 stars"></label>
                                <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="4 stars"></label>
                                <input type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half" title="3.5 stars"></label>
                                <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="3 stars"></label>
                                <input type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half" title="2.5 stars"></label>
                                <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="2 stars"></label>
                                <input type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half" title="1.5 stars"></label>
                                <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="1 star"></label>
                                <input type="radio" id="starhalf" name="rating" value="0.5" /><label class="half" for="starhalf" title="0.5 stars"></label>
                            </fieldset>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Subject</label>
                                    <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                        <?= $detail->row()->subject ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                        <?= $detail->row()->desc ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <img class="img-responsive pad" style="max-width: 300px;" src="<?= base_url() ?>upload/img/<?= $detail->row()->image ?>" alt="Photo" data-toggle="modal" data-target="#imageIssue">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                <button onclick="trackingIssue(this)" data-issue-id="<?= $detail->row()->id ?>" type="button" class="btn btn-warning btn-sm">Action History</button>
                <!-- <button onclick="" type="button" class="btn btn-primary">Close Issue</button> -->
            </div>
        </div>
    </div>
</div>
<script>
    document.querySelector('input[name="rating"][value="<?= $detail->row()->bintang ?>"]').setAttribute("checked","checked");
</script>