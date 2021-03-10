<div class="page-content">
	<nav class="page-breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">User</a></li>
			<li class="breadcrumb-item active" aria-current="page">Pre Incubation</li>
		</ol>
	</nav>
	<form method="post" action="<?=base_url()?>User/pre_incubation_app_post">
		<div class="col-md-12 grid-margin stretch-card">
			<div class="card">
				<?php if ($this->session->flashdata('fail')) : ?>
                    <span style="line-height:3" class="badge badge-danger"><?php echo $this->session->flashdata('fail'); ?></span>
                <?php endif; ?>
                <?php if ($this->session->flashdata('success')) : ?>
                    <span style="line-height:3" class="badge badge-success"><?php echo $this->session->flashdata('success'); ?></span>
                <?php endif; ?>
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
								<input name="business_category_1" type="checkbox" value="yes" class="form-check-input">
								Service
							</label>
						</div>
						<div class="form-check form-check-inline">
							<label class="form-check-label">
								<input name="business_category_2" value="yes" type="checkbox" class="form-check-input">
								Product
							</label>
						</div>
						<div class="form-check form-check-inline">
							<label class="form-check-label">
								<input type="checkbox" value="yes" name="business_category_3" class="form-check-input">
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
								<input name="ser_workspace" type="checkbox" value="yes" class="form-check-input">
								Workspace
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input name="ser_lab" value="yes" type="checkbox" class="form-check-input">
								Share Laboratory Facility
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input name="ser_web" value="yes" type="checkbox" class="form-check-input">
								Web Based Service
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input name="ser_res" value="yes" type="checkbox" class="form-check-input">
								R&D Support
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input name="ser_adv" value="yes" type="checkbox" class="form-check-input">
								Advisory Services
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input name="ser_oth" id="ser_others" value="yes" type="checkbox" onclick="serviceShowSpecifyOthers()" class="form-check-input">
								Others
						</div>
						<input id="ser_others_text" type="text" class="form-control" placeholder="Specify" name="ser_others_text" style="display: none;">
					</div>

					<div class="form-group">
						<label for="bus_experience">Do you or your team members have any previous experience?</label>
						<select onchange="businessExperienceYes(this.value)" required class="form-control" name="bus_experience">
							<option>select an option</option>
							<option value="yes">Yes</option>
							<option value="no">No</option>
						</select>
						<div id="bus_experience" class="form-group mt-3" style="padding-left: 20px; display:none">
							<label>1. If yes,how many years? Furnish Details(100 Words) :</label>
							<textarea type="text" class="form-control" name="bus_experience_years"></textarea>
							<label>2. How do you think your past experience is going to help you in this new venture?(Maximum 150 words) :</label>
							<textarea type="text" class="form-control" name="bus_experience_help"></textarea>
							<label>3. Write a brief note about your product or service(Maximum 300 words) :</label>
							<textarea type="text" class="form-control" name="bus_experience_service"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label>Do you currently have the following? (Tick all that apply) :</label>

					</div>
					<div class="form-group" style="margin-left:10px ;">
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" name="business_plan" value="yes" class="form-check-input">
								Business Plan
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" name="business_plan_outline" value="yes" class="form-check-input">
								Business Plan Outline
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" name="maket_feasibility_study" value="yes" class="form-check-input">
								Market Feasibility Study
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" name="intellectual_property_strategy" value="yes" class="form-check-input">
								Intellectual Property Strategy
							</label>
						</div>
					</div>
					<div class="form-group">
						<label for="businessTime">Do you need any machinery or capital item for starting your venture?</label>
						<select class="form-control" name="bus_machinary_capital" required onchange="busMachinaryCapital(this.value)">
							<option>select an option</option>
							<option value="yes">Yes</option>
							<option value="no">No</option>
						</select>
						<input type="text" class="form-control mt-3" placeholder="Specify" style="display: none;" id="bus_machinary_capital" name="bus_machinary_capital_yes">
					</div>
					<div class="form-group">
						<label for="businessTime">Have you estimated your project cost?</label>
						<select class="form-control" name="bussiness_estimate" required onchange="busEstimateYes(this.value)">
							<option>select an option</option>
							<option value="yes">Yes</option>
							<option value="no">No</option>
						</select>
						<div style="padding-left: 20px; display:none" class="mt-3" id="bussiness_estimate">
							<label>Preoperative expenses: Rs.</label>
							<input type="number" class="form-control" name="bussiness_estimate_preoperative">
							<label>Prototype Development: Rs.</label>
							<input type="number" class="form-control" name="bussiness_estimate_prototype">
							<label>Test Marketing: Rs.</label>
							<input type="number" class="form-control" name="bussiness_estimate_marketing">
							<label>Equipment: Rs.</label>
							<input type="number" class="form-control" name="bussiness_estimate_equipment">
							<label>Working Capital: Rs.</label>
							<input type="number" class="form-control" name="bussiness_estimate_capital">
							<label>Other Requirements: Rs.</label>
							<input type="number" class="form-control" name="bussiness_estimate_other_req">
							<label><b>Total: Rs.</b></label>
							<input type="number" class="form-control" name="bussiness_estimate_total">
						</div>
					</div>
					<div class="form-group">
						<label>Have you estimated and identified your seed financing needs/source? (Furnish Details) :</label>
						<textarea type="text" class="form-control" name="funding_needs_source" required></textarea>
					</div>
					<div class="form-group">
						<label>How do you intend to finance the business for the next 2 years? (100 Words) :</label>
						<textarea type="text" class="form-control" name="intend_finance" required></textarea>
					</div>
					<div class="form-group">
						<label>Have you done any Market Survey?</label>
						<select class="form-control" name="market_survey" required onchange="marketSurvey(this.value)">
							<option>select an option</option>
							<option value="yes">Yes</option>
							<option value="no">No</option>
						</select>
						<div id="market_survey" class="mt-3" style="display: none;">
							<div class="form-group" style="padding-left: 20px;">
								<label for="marketSurvey">1. If yes,briefly describe the methods and results (Maximum 200 words) :</label>
								<textarea type="text" class="form-control" name="market_survey_methods_results"></textarea>
							</div>
							<div class="form-group" style="padding-left: 20px;">
								<label for="marketSurvey">2. Describe your target market (Maximum 100 words) :</label>
								<textarea type="text" class="form-control" name="market_survey_target"></textarea>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="source">Is this technology your own ?</label>
						<select class="form-control" required name="tech_own_other" onchange="techOwnOther(this.value)">
							<option>select an option</option>
							<option value="yes">Yes</option>
							<option value="no">No</option>
						</select>
						<div id="tech_own_other" class="mt-3" style="display: none;">
							<div class="form-group" style="padding-left: 20px;">
								<label for="source">1. If your own,have you completed technology development? Or what stage you are in the developmental process?What is the estimated time for completion of development of the technology?(100 Words)
									:</label>
								<textarea type="text" class="form-control" name="tech_own_other_one"></textarea>
							</div>
							<div class="form-group" style="padding-left: 20px;">
								<label for="source">2. Can your technology or product be patented,trademarked or protected from duplication(if applicable)?If not what other sustainable competitive advatnage do you have? :</label>
								<textarea type="text" class="form-control" name="tech_own_other_two"></textarea>
							</div>
						</div>
					</div>
					<div class=" form-group ">
						<label for="space">Your reason(s) for seeking space in the incubator(Maximum 100 Words) :</label>
						<textarea type="text " class="form-control " name="bus_reason" required></textarea>
					</div>
					<div class=" form-group ">
						<label for="space">How much money has already been invested in the company and by whom? Furnish details. :</label>
						<textarea type="text " class="form-control " name="already_invested" required></textarea>
					</div>
					<div class=" form-group ">
						<label for="space">Does your business have special facility needs? If yes,specify. :</label>
						<select class="form-control mb-3" name="space" required name="bus_special_facility" onchange="busSpecialFacility(this.value)">
							<option>select an option</option>
							<option value="yes">Yes</option>
							<option value="no">No</option>
						</select>
						<textarea style="display: none;" id="bus_special_facility" type="text" class="mt-3 form-control" name="bus_special_facility_yes"></textarea>
					</div>
					<div class="form-group">
						<label for="hazardous">Do you expect to use any hazardous or toxic materials?If so,describe. : </label>
						<select class="form-control mb-3" name="bus_hazardous" required onchange="busHazardous(this.value)">
							<option>select an option</option>
							<option value="yes">Yes</option>
							<option value="no">No</option>
						</select>
						<textarea style="display: none;" id="bus_hazardous" type="text" class="mt-3 form-control" name="bus_hazardous_yes"></textarea>
					</div>
					<div class="form-group">
						<label for="assistance">Do you need technology development or assistance? (Tick areas of assistance required from the incubator whichever apply) :</label>
					</div>
					<div class="form-group" style="margin-left:10px ;">
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" name="ass_strategy" value="yes" class="form-check-input">
								Strategy
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" name="ass_managemet" value="yes" class="form-check-input">
								Management
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" name="ass_marketing" value="yes" class="form-check-input">
								Marketing
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" name="ass_hr" value="yes" class="form-check-input">
								Human Resources
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" name="ass_commercialization" value="yes" class="form-check-input">
								Commercialization
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" name="ass_legal" value="yes" class="form-check-input">
								Legal
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" id="ass_other" name="ass_other" value="yes" class="form-check-input" onclick="assistanceOther()">
								Others,please specify:
							</label>
							<input type="text" id="ass_other_text" name="ass_other_text" style="display:none;" class="form-control" name="others">
						</div>
					</div>
					<div class="form-group">
						<label>Staff Mentors (Can be from any Department)</label>
						<textarea type="text" class="form-control" name="staff_mentors"></textarea>
					</div>
					<h5 class="text-center">DETAILS OF YOUR TEAM</h5><br>
					<div class="form-group">
						<div class="table-responsive">
							<hr>
							<table class="table table-hover" id="wrapper_3">
								<tbody class="text-center" >
									<tr>
										<th>Name</th>
										<td><input type="text" class="form-control" name="team_name[]"></td>
									</tr>
									<tr>
										<th>Admission Number</th>
										<td><input name="team_adm_num[]" class="form-control" type="text"></td>
									</tr>
									<tr>
										<th>Email</th>
										<td><input name="team_email[]" class="form-control" type="email"></td>
									</tr>
									<tr>
										<th>Phone</th>
										<td><input name="team_phone[]" class="form-control" type="phone"></td>
									</tr>
									<tr>
										<th>Department</th>
										<td><input name="team_department" class="form-control" type="text"></td>
									</tr>
									<tr>
										<th>Year</th>
										<td><input name="team_year[]" class="form-control" type="text"></td>
									</tr>
								</tbody>
							</table>
							<hr>

							<span  class="btn btn-primary mr-2" onclick="addTeamMember()">Add Member</span>
						</div>
						<button class="btn btn-primary mr-2 mt-5" type="submit">Submit</button>
					</div>
				</div>
	</form>

	<style>
		hr {
			border: 1px solid black;			
		}
	</style>
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

		function businessExperienceYes(val) {
			var element = document.getElementById('bus_experience');
			if (val == 'yes')
				element.style.display = 'block';
			else
				element.style.display = 'none';
		}

		function busMachinaryCapital(val) {
			var element = document.getElementById('bus_machinary_capital');
			if (val == 'yes')
				element.style.display = 'block';
			else
				element.style.display = 'none';
		}

		function busEstimateYes(val) {
			var element = document.getElementById('bussiness_estimate');
			if (val == 'yes')
				element.style.display = 'block';
			else
				element.style.display = 'none';
		}

		function marketSurvey(val) {
			var element = document.getElementById('market_survey');
			if (val == 'yes')
				element.style.display = 'block';
			else
				element.style.display = 'none';
		}

		function techOwnOther(val) {
			var element = document.getElementById('tech_own_other');
			if (val == 'yes')
				element.style.display = 'block';
			else
				element.style.display = 'none';
		}

		function busSpecialFacility(val) {
			var element = document.getElementById('bus_special_facility');
			if (val == 'yes')
				element.style.display = 'block';
			else
				element.style.display = 'none';
		}

		function busHazardous(val) {
			var element = document.getElementById('bus_hazardous');
			if (val == 'yes')
				element.style.display = 'block';
			else
				element.style.display = 'none';
		}


		function assistanceOther() {
			// Get the checkbox
			var checkBox = document.getElementById("ass_other");
			// Get the output text
			var text = document.getElementById("ass_other_text");

			// If the checkbox is checked, display the output text
			if (checkBox.checked == true) {
				text.style.display = "block";
			} else {
				text.style.display = "none";
			}
		}

		function addTeamMember() {
			document.getElementById('wrapper_3').innerHTML += '<hr><table class="table table-hover"><tbody class="text-center" ><tr><th>Name</th><td><input type="text" class="form-control" name="team_name[]"></td></tr><tr><th>Admission Number</th><td><input name="team_adm_num[]" class="form-control" type="text"></td></tr><tr><th>Email</th><td><input name="team_email[]" class="form-control" type="email"></td></tr><tr><th>Phone</th><td><input name="team_phone[]" class="form-control" type="phone"></td></tr><tr><th>Department</th><td><input name="team_department" class="form-control" type="text"></td></tr><tr><th>Year</th><td><input name="team_year[]" class="form-control" type="text"></td></tr></tbody></table>';
		}
	</script>