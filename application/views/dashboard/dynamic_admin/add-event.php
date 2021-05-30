<div class="row">
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h6 class="card-title">IEDC Form</h6>
            <form class="forms-sample" action="<?=base_url()?>admin/add_event">
              <div class="form-group">
                <label for="exampleInputUsername1">Event Title</label>
                <input
                  name="event_title"
                  type="text"
                  class="form-control"
                  name="event_title"
                  id="exampleInputUsername1"
                  autocomplete="off"
                  placeholder="Title"
                />
              </div>

              <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Event Description</h4>
                      <textarea
                        name="event_desc"
                        class="form-control"
                        name="tinymce"
                        id="simpleMdeExample"
                        rows="10"
                      ></textarea>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Event Poster-->
              <div class="form-group">
                <label>Event Poster</label>
                <input type="file" name="img[]" class="file-upload-default" />
                <div class="input-group col-xs-12">
                  <input
                    type="text"
                    name="img_link_public"
                    class="form-control file-upload-info"
                    disabled=""
                    placeholder="Upload Image"
                  />
                  <span class="input-group-append">
                    <button
                      class="file-upload-browse btn btn-primary"
                      type="button"
                    >
                      Upload
                    </button>
                  </span>
                </div>
              </div>

              <!-- Is Public-->
              <div class="radio-group">
                <label for="exampleInputPassword1">Is Public : </label>
                <div class="form-check">
                  <label class="form-check-label">
                    <input
                      type="radio"
                      class="form-check-input"
                      name="is_public"
                      id="optionsRadios0"
                      value="option5"
                    />
                    Yes
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input
                      type="radio"
                      class="form-check-input"
                      name="is_public"
                      id="optionsRadios01"
                      value="option5"
                    />
                    No
                  </label>
                </div>
              </div>

              <!-- Event Image-->
              <div class="form-group">
                <label>Registration Image Link</label>
                <input type="file" name="img[]" class="file-upload-default" />
                <div class="input-group col-xs-12">
                  <input
                    type="text"
                    class="form-control file-upload-info"
                    name="image_link_reg"
                    disabled=""
                    placeholder="Upload Image"
                  />
                  <span class="input-group-append">
                    <button
                      class="file-upload-browse btn btn-primary"
                      type="button"
                    >
                      Upload
                    </button>
                  </span>
                </div>
              </div>

              <!-- Event Date-->
              <div class="form-group">
                <label for="exampleEventDate">Event Date</label>
                <input
                  type="text"
                  class="form-control"
                  name="event_date"
                  id="exampleEventDate1"
                  placeholder="dd/mm/yyyy"
                />
              </div>

              <!-- Event Time-->
              <div class="form-group">
                <label for="exampleInputPassword1">Event Time</label>
                <input
                  type="Text"
                  class="form-control"
                  name="event_time"
                  id="exampleInputPassword1"
                  autocomplete="off"
                  placeholder="H:M PM/AM"
                />
              </div>

              <!-- Event Venue-->
              <div class="form-group">
                <label for="exampleInputPassword1">Event Venue</label>
                <input
                  type="text"
                  class="form-control"
                  name="event_venue"
                  id="exampleInputPassword1"
                  autocomplete="off"
                  placeholder="Venue"
                />
              </div>

              <!-- Event Name1-->
              <div class="form-group">
                <label for="exampleInputPassword1">Contact Name 1</label>
                <input
                  type="text"
                  class="form-control"
                  name="contact_1_name"
                  id="exampleInputPassword1"
                  autocomplete="off"
                  placeholder="Name"
                />
              </div>

              <!-- Event Nuumber1-->
              <div class="form-group">
                <label for="exampleInputPassword1">contact number 1</label>
                <input
                  type="text"
                  class="form-control"
                  name="contact_1_num"
                  id="exampleInputPassword1"
                  autocomplete="off"
                  placeholder="Number"
                />
              </div>

              <!-- Event Name2-->
              <div class="form-group">
                <label for="exampleInputPassword1">Contact Name 2</label>
                <input
                  type="text"
                  class="form-control"
                  name="contact_2_name"
                  id="exampleInputPassword1"
                  autocomplete="off"
                  placeholder="Name"
                />
              </div>

              <!-- Event Nmuber2-->
              <div class="form-group">
                <label for="exampleInputPassword1">Contact Number 2</label>
                <input
                  type="text"
                  class="form-control"
                  name="contact_2_num"
                  id="exampleInputPassword1"
                  autocomplete="off"
                  placeholder="Number"
                />
              </div>

              <!-- Event Link-->
              <div class="form-group">
                <label for="exampleInputPassword1">Event Link</label>
                <input
                  type="text"
                  class="form-control"
                  name="event_link"
                  id="exampleInputPassword1"
                  autocomplete="off"
                  placeholder="Link"
                />
              </div>

              <!-- Event Fee-->
              <div class="form-group">
                <label for="exampleInputPassword1">Event Fee</label>
                <input
                  type="Number"
                  class="form-control"
                  name="event_fee"
                  id="exampleInputPassword1"
                  autocomplete="off"
                  placeholder="Fee"
                />
              </div>

              <!-- Event Members-->
              <div class="form-group">
                <label for="exampleInputPassword1">Max Members</label>
                <input
                  type="Number"
                  class="form-control"
                  name="max_members"
                  id="exampleInputPassword1"
                  autocomplete="off"
                  placeholder="Members"
                />
              </div>

              <!-- Is Iedc Member-->
              <div class="radio-group">
                <label for="exampleInputPassword1">Is Iedc Member : </label>
                <div class="form-check">
                  <label class="form-check-label">
                    <input
                      type="radio"
                      class="form-check-input"
                      name="is_iedc_member"
                      id="optionsRadios1"
                      value="option5"
                    />
                    Yes
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input
                      type="radio"
                      class="form-check-input"
                      name="is_iedc_member"
                      id="optionsRadios2"
                      value="option5"
                    />
                    No
                  </label>
                </div>
              </div>

              <!-- Is Registration Open-->
              <div class="radio-group">
                <label for="exampleInputPassword1"
                  >Is Registration Open :
                </label>
                <div class="form-check">
                  <label class="form-check-label">
                    <input
                      type="radio"
                      class="form-check-input"
                      name="is_reg_open"
                      id="optionsRadios3"
                      value="option5"
                    />
                    Yes
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input
                      type="radio"
                      class="form-check-input"
                      name="is_reg_open"
                      id="optionsRadios4"
                      value="option5"
                    />
                    No
                  </label>
                </div>
              </div>

              <!-- Is Certificate Published-->
              <div class="radio-group">
                <label for="exampleInputPassword1"
                  >Is Certificate Published :
                </label>
                <div class="form-check">
                  <label class="form-check-label">
                    <input
                      type="radio"
                      class="form-check-input"
                      name="is_certificate_published"
                      id="optionsRadios5"
                      value="option5"
                    />
                    Yes
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input
                      type="radio"
                      class="form-check-input"
                      name="is_certificate_published"
                      id="optionsRadios6"
                      value="option5"
                    />
                    No
                  </label>
                </div>
              </div>

              <!-- Is File Submission-->
              <div class="radio-group">
                <label for="exampleInputPassword1">Is File Submission : </label>
                <div class="form-check">
                  <label class="form-check-label">
                    <input
                      type="radio"
                      class="form-check-input"
                      name="is_file_submission"
                      id="optionsRadios7"
                      value="option5"
                    />
                    Yes
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input
                      type="radio"
                      class="form-check-input"
                      name="is_file_submission"
                      id="optionsRadios8"
                      value="option5"
                    />
                    No
                  </label>
                </div>
              </div>

              <!-- Is Team-->
              <div class="radio-group">
                <label for="exampleInputPassword1">Is Team : </label>
                <div class="form-check">
                  <label class="form-check-label">
                    <input
                      type="radio"
                      class="form-check-input"
                      name="is_team"
                      id="optionsRadios9"
                      value="option5"
                    />
                    Yes
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input
                      type="radio"
                      class="form-check-input"
                      name="is_team"
                      id="optionsRadios10"
                      value="option5"
                    />
                    No
                  </label>
                </div>
              </div>

              <!-- Is Payment Id-->
              <div class="radio-group">
                <label for="exampleInputPassword1">Is Payment Id : </label>
                <div class="form-check">
                  <label class="form-check-label">
                    <input
                      type="radio"
                      class="form-check-input"
                      name="is_payment_id"
                      id="optionsRadios11"
                      value="option5"
                    />
                    Yes
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input
                      type="radio"
                      class="form-check-input"
                      name="is_payment_id"
                      id="optionsRadios12"
                      value="option5"
                    />
                    No
                  </label>
                </div>
              </div>

              <!-- Event Poster-->
              <div class="form-group">
                <label>Certificate File 0</label>
                <input type="file" name="img[]" class="file-upload-default" />
                <div class="input-group col-xs-12">
                  <input
                    type="text"
                    class="form-control file-upload-info"
                    disabled=""
                    name="cert_file_0"
                    placeholder="Upload File 0"
                  />
                  <span class="input-group-append">
                    <button
                      class="file-upload-browse btn btn-primary"
                      type="button"
                    >
                      Upload
                    </button>
                  </span>
                </div>
              </div>

              <!-- Event Poster-->
              <div class="form-group">
                <label>Certificate File 1</label>
                <input type="file" name="img[]" class="file-upload-default" />
                <div class="input-group col-xs-12">
                  <input
                    type="text"
                    name="cert_file_1"
                    class="form-control file-upload-info"
                    disabled=""
                    placeholder="Upload File 1"
                  />
                  <span class="input-group-append">
                    <button
                      class="file-upload-browse btn btn-primary"
                      type="button"
                    >
                      Upload
                    </button>
                  </span>
                </div>
              </div>

              </div>
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              <button class="btn btn-light">Cancel</button>
            </form>
          </div>
        </div>
      </div>
    </div>