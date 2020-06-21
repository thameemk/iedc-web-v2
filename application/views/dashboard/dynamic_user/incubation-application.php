<div class="page-content">
	<nav class="page-breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">User</a></li>
			<li class="breadcrumb-item active" aria-current="page">Pre Incubation</li>
		</ol>
	</nav>
	<form method="post" action="">
		<div class="col-md-12 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h3 class="card-sub-title text-center mb-5">
						APPLICANT DETAILS
					</h3>
					<div class="form-group">
						<label for="companyName font-weight-bold">Company Name / Proposed Company Name :</label>
						<input type="text" class="form-control" name="company_name" placeholder="Enter Company Name" required>
					</div>
					<div class="form-group">
						<h5 class="text-center">DETAILS OF PARENT/GUARDIAN</h5><br>
						<div class="form-group">
							<label for="parentName">Name :</label>
							<input type="text" class="form-control" name="parent_name" placeholder="Enter Name" required>
						</div>
						<div class="form-group">
							<label for="parentmobileNumber">Number :</label>
							<input type="text" class="form-control" name="parent_mobile_number" placeholder="Enter Mobile Number" required>
						</div>
						<div class="form-group">
							<label for="parentEmail">Email :</label>
							<input type="email" class="form-control" name="parent_email" placeholder="Enter Email" required>
						</div>
					</div>

					<div class="form-group">
						<h5 class="text-center">ADDRESS</h5><br>
						<div class="form-group">
							<label>Address of Communication</label>
							<input type="text" class="form-control" name="comm_address" placeholder="Enter communication Address" required>
						</div>
						<div class="form-group">
							<label>Permanent of Communication</label>
							<input type="text" class="form-control" name="perm_address" placeholder="Enter permenent Address" required>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="col-md-12 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h3 class="card-sub-title text-center mb-5">
						DETAILS OF BUSINESS / IDEA
					</h3>
					<div class="form-group">
						<label for="businessCategory">Category of Business / Idea :</label>
					</div>
					<div class="form-group" style="margin-left:10px ;">
						<div class="form-check form-check-inline">
							<label class="form-check-label">
								<input name="business_category_1" type="checkbox" value="service" class="form-check-input">
								Service
							</label>
						</div>
						<div class="form-check form-check-inline">
							<label class="form-check-label">
								<input name="business_category_2" value="product" type="checkbox" class="form-check-input">
								Product
							</label>
						</div>
						<div class="form-check form-check-inline">
							<label class="form-check-label">
								<input type="checkbox" value="not_for_profit" name="business_category_3" class="form-check-input">
								Not For Profit(Trust/NGO etc)
							</label>
						</div>

					</div>
					<div class="form-group">
						<label for="businessIdea">Area of Business / Idea : </label>
						<input type="text" class="form-control" name="business_idea" placeholder="Specifiy your area of business or idea" required>
					</div>
					<div class="form-group">
						<label for="businessTime">How long have you been in Business?</label>
						<select class="form-control" name="business_time" required>
							<option value="conceptual">Conceptual</option>
							<option value="less_than_a_year">Less than a year</option>
							<option value="less_than_two_years">Less than 2 years</option>
							<option value="less_than_five_years">More than 5 years</option>
						</select>
					</div>
					<div class="form-group">
						<label for="businessOwnership">Legal Entity (Proposed) : </label>
						<select class="form-control" name="business_ownership" onchange="businessOwnershipOther(this.value)" required>
							<option value="">select an option</option>
							<option value="proprietorship">Proprietorship</option>
							<option value="partnership">Partnership</option>
							<option value="other">Other</option>
						</select>
						<input class="mt-3 form-control" id="business_ownership" style='display:none;' name="business_ownership_other" type="text" placeholder="Specify" />

					</div>
					<div class="form-group">
						<h5 class="mb-3 text-center">DESCRIPTION OF THE IDEA</h5>
						<div class="form-group">
							<label for="problemStatement">Problem Statement (Max 200 words) :</label>
							<textarea required class="form-control" name="problem_statement"></textarea>
						</div>
						<div class="form-group">
							<label for="solution">Solution (Max 200 words) :</label>
							<textarea required class="form-control" name="solution"></textarea>
						</div>
						<div class="form-group">
							<label for="targetedCustomer">Targeted Customer Segment (Max 100 words) :</label>
							<textarea required class="form-control" name="targeted_customer"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="description">Brief Description of the underlying Innovation and Technology(300 words) :</label>
						<textarea required class="form-control" name="description"></textarea>
					</div>
					<div class="form-group">
						<label for="application">Possible Application of Your Innovation :</label>
						<textarea class="form-control" name="possible_application" required></textarea>
					</div>
					<div class="form-group">
						<label for="businessCategory">Service expected from IEDC :</label>
					</div>
					<div class="form-group" style="margin-left:10px ;">
						<div class="form-check">
							<label class="form-check-label">
								<input name="ser_workspace" type="checkbox" value="workspace" class="form-check-input">
								Workspace
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input name="ser_lab" value="share_laboratory_facility" type="checkbox" class="form-check-input">
								Share Laboratory Facility
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input name="ser_web" value="web_based_service" type="checkbox" class="form-check-input">
								Web Based Service
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input name="ser_res" value="r_and_d_support" type="checkbox" class="form-check-input">
								R&D Support
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input name="ser_adv" value="advisory_service" type="checkbox" class="form-check-input">
								Advisory Services
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input name="ser_oth" id="ser_others" value="others" type="checkbox" onclick="serviceShowSpecifyOthers()" class="form-check-input">
								Others
						</div>
						<input id="ser_others_text" type="text" class="form-control" placeholder="Specify" name="ser_others_text" style="display: none;">
					</div>

					<div class="form-group">
						<label for="businessTime">Do you or your team members have any previous experience?</label>
						<select class="form-control" name="businessTime">
							<option>Yes</option>
							<option>No</option>
						</select>
						<div class="form-group" style="padding-left: 20px;">
							<label for="extra">1.If yes,how many years? Furnish Details(100 Words) :</label>
							<textarea type="text" class="form-control" name="extra"></textarea>
							<label for="extra">2.How do you think your past experience is going to help you in this new venture?(Maximum 150 words) :</label>
							<textarea type="text" class="form-control" name="extra"></textarea>
							<label for="extra">3.Write a brief note about your product or service(Maximum 300 words) :</label>
							<textarea type="text" class="form-control" name="extra"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="applicantName">Do you currently have the following?(Tick all that apply) :</label>

					</div>
					<div class="form-group" style="margin-left:10px ;">
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input">
								Business Plan
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input">
								Business Plan Outline
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input">
								Market Feasibility Study
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input">
								Intellectual Property Strategy
							</label>
						</div>
					</div>
					<div class="form-group">
						<label for="businessTime">Do you need any machinery or capital item for starting your venture?</label>
						<select class="form-control" name="businessTime">
							<option>Yes</option>
							<option>No</option>
						</select>
						<div>
							<input type="text" class="form-control" placeholder="Specify" name="items">
						</div>
					</div>
					<div class="form-group">
						<label for="businessTime">Have you estimated your project cost?</label>
						<select class="form-control" name="businessTime">
							<option>Yes</option>
							<option>No</option>
						</select>
						<div style="padding-left: 20px;">
							<label for="items">Preoperative expenses: Rs.</label>
							<input type="text" class="form-group" name="items"><br>
							<label for="items">Prototype Development: Rs.</label>
							<input type="text" class="form-group" name="items"><br>
							<label for="items">Test Marketing: Rs.</label>
							<input type="text" class="form-group" name="items"><br>
							<label for="items">Equipment: Rs.</label>
							<input type="text" class="form-group" name="items"><br>
							<label for="items">Working Capital: Rs.</label>
							<input type="text" class="form-group" name="items"><br>
							<label for="items">Other Requirements: Rs.</label>
							<input type="text" class="form-group" name="items"><br>
							<label for="items"><b>Total: Rs.</b></label>
							<input type="text" class="form-group" name="items"><br>
						</div>
					</div>
					<div class="form-group">
						<label for="fundingSource">Have you estimated and identified your seed financing needs/source?(Furnish Details) :</label>
						<textarea type="text" class="form-control" name="fundingSource"></textarea>
					</div>
					<div class="form-group">
						<label for="finance">How do you intend to finance the business for the next 2 years?(100 Words) :</label>
						<textarea type="text" class="form-control" name="finance"></textarea>
					</div>
					<div class="form-group">
						<label for="marketSurvey">Have you done any Market Survey?</label>
						<select class="form-control" name="businessTime">
							<option>Yes</option>
							<option>No</option>
						</select>
						<div class="form-group" style="padding-left: 20px;">
							<label for="marketSurvey">1.If yes,briefly describe the methods and results (Maximum 200 words) :</label>
							<textarea type="text" class="form-control" name="marketSurvey"></textarea>
						</div>
						<div class="form-group" style="padding-left: 20px;">
							<label for="marketSurvey">2.Describe your target market (Maximum 100 words) :</label>
							<textarea type="text" class="form-control" name="marketSurvey"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="source">Is this technology your own or obtained from other sources?</label>
						<select class="form-control" name="businessTime">
							<option>Yes</option>
							<option>No</option>
						</select><br>
						<div class="form-group" style="padding-left: 20px;">
							<label for="source">1.If your own,have you completed technology development? Or what stage you are in the developmental process?What is the estimated tme for completion of development of the technology?(100 Words)
								:</label>
							<textarea type="text" class="form-control" name="source"></textarea>
						</div>
						<div class="form-group" style="padding-left: 20px;">
							<label for="source">2.Can your technology or product be patented,trademarked or protected from duplication(if applicable)?If not what other sustainable competitive advatnage do you have? :</label>
							<textarea type="text" class="form-control" name="source"></textarea>
						</div>
					</div>
					<div class=" form-group ">
						<label for="space">Your reason(s) for seeking space in the incubator(Maximum 100 Words) :</label>
						<textarea type="text " class="form-control " name="space"></textarea>
					</div>
					<div class=" form-group ">
						<label for="space">How much money has already been invested in the company and by whom?Furnish details. :</label>
						<textarea type="text " class="form-control " name="space"></textarea>
					</div>
					<div class=" form-group ">
						<label for="space">Does your business have special facility needs? If yes,specify. :</label>
						<select class="form-control mb-3" name="space">
							<option>Yes</option>
							<option>No</option>
						</select>
						<div style="padding-left: 20px;">
							<input type="text" class="form-control" name="space">
						</div>
					</div>
					<div class="form-group">
						<label for="hazardous">Do you expect to use any hazardous or toxic materials?If so,describe. : </label>
						<select class="form-control mb-3" name="hazardous">
							<option>Yes</option>
							<option>No</option><br>
						</select>
						<textarea type="text" class="form-group" name="hazardous"></textarea>
					</div>
					<div class="form-group">
						<label for="assistance">Do you need technology development or assistance? (Tick areas of assistance required from the incubator whichever apply) :</label>

					</div>
					<div class="form-group" style="margin-left:10px ;">
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input">
								Strategy
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input">
								Management
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input">
								Marketing
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input">
								Human Resources
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input">
								Commercialization
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input">
								Legal
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input">
								Others,please specify:
							</label>
							<input type="text" class="form-group" name="others">
						</div>
					</div>
					<div class="form-group">
						<label>Department which any of the members belongs to</label><br>
						<input type="text" class="form-control">
						<label>Staff Mentors(Can be from any Department)<br>
							<input type="text" class="form-control">
					</div>
					<div>
						<h5>Details of your Team :</h5><br>
						<div style="padding-left: 20px;">
							<label>List the name(s) of the Principal(s)/Co-promoter(/Employees)</label>
							<input type="text" class="form-control"><br>
						</div>
					</div>
					<div class="form-group">
						<div style="margin-left: 40 px;padding-left: 20px;">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label class="control-label">Admission Number :</label>
										<input type="text" class="form-control">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label class="control-label">Year of Study :</label>
										<input type="text" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-5">
									<div class="form-group">
										<label class="control-label">Department :</label>
										<input type="text" class="form-control">
									</div>
								</div>
								<div class="col-sm-5">
									<div class="form-group">
										<label class="control-label">Mobile : </label>
										<input type="text" class="form-control">
									</div>
								</div>
								<div class="col-sm-5">
									<div class="form-group">
										<label class="control-label">Email :</label>
										<input type="text" class="form-control">
									</div>
								</div>
							</div>
							<button class="btn btn-primary mr-2" disabled>Add Member</button>
						</div>
					</div>
					<button type="submit" class="btn btn-primary mr-2" disabled>Submit</button>
				</div>
			</div>
	</form>
</div>

<script>
	function businessOwnershipOther(val) {
		var element = document.getElementById('business_ownership');
		if (val == 'select an option' || val == 'other')
			element.style.display = 'block';
		else
			element.style.display = 'none';
	}

	function serviceShowSpecifyOthers() {
		// Get the checkbox
		var checkBox = document.getElementById("ser_others");
		// Get the output text
		var text = document.getElementById("ser_others_text");

		// If the checkbox is checked, display the output text
		if (checkBox.checked == true) {
			text.style.display = "block";
		} else {
			text.style.display = "none";
		}
	}
</script>