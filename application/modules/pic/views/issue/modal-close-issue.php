<style>
    
fieldset, label { 
  margin: 0; 
  padding: 0; 
}

h1 { 
  font-size: 22px; 
  margin: 10px; 
  font-weight: normal;
}

fieldset {
  margin: 20px 0 40px;
}


.rating { 
  border: none;
  float: left;
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

input[type="submit"] {
  margin-top: 5px;
  background-color: #302d2b;
  color: white;
  border: none;
  border-radius: 5px;
  padding: 12px 30px;
}

input[type="submit"]:focus {
  outline: 0;
}

input[type="submit"]:active {
  transform: scale(0.98);
}

input[type="submit"]:disabled {
  background-color: #ddd;
  cursor: not-allowed;
}

.fa-heart {
  color: red;
  font-size: 30px;
  margin-bottom: 10px;
}

.fa-heart:before {
  content: "\f004";
  font-family: FontAwesome;
}
</style>
<div class="modal fade" id="modal-close-issue">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Close Issuex</h4>
            </div>
            <div class="modal-body" style="max-height: 300px; overflow-y: auto;">
                <form action="<?=base_url('issue/closeissue')?>" method="POST" id="formCloseIssue">
                    <div class="form-group">
                        <label for="">Note</label>
                        <textarea class="form-control" name="note" id="note" cols="20" rows="5"></textarea>
                        <input type="hidden" name="issue_id" id="close-issue-id">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button onclick="closeIssue(this)" data-issue-id="" type="button" class="btn btn-success">Submit</button>
            </div>
        </div>
    </div>
</div>