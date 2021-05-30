<div style="background: white;" id="slider" class="inspiro-slider" data-height="380">

    <div class="slide">
        <div class="container">
            <div class="slide-captions text-center text-dark">

                <h3>Invitation for</h3>
                <h2>PROJECT PROPOSALS</h2>

            </div>
        </div>
    </div>

</div>




<div class="container">
    <center>
        <img src="https://static.thenounproject.com/png/1618316-200.png">
    </center>
    <div class="row">
        <div class="mb-1">
            <p style="font-size:1.3em;">
                Ideas are the beginning points of all fortunes.
                <br><br>
                Do you have a marvelous project in your hands now? Do you have the vision to implement it in large
                scale?
                Well then,
                IEDC is here to help you out on your way. IEDC TKMCE is inviting project proposals that deserve funding.
                Submit your
                project details and earn adequate funds and take your project to the next level.
                <br><br>
                What are you waiting for? Get your million-dollar idea on the go!
                <br><br>
                Follow the below steps to submit your response !
            </p>
        </div>
    </div>

    <div class="row ml-3 mt-3 mb-3">
        <style>
            li:not(:last-child) {
                margin-bottom: 5px;
            }
        </style>
        <ol style="font-size:1.3em !important;letter-spacing:1px;">
            <?php if ($this->session->userdata('sess_logged_in') == 0) { ?>
                <li> Please login or access your profile & Complete profile if not done
                    <a style="color:#007bff !important;" href="<?php echo $loginURL ?>">[ Click here ]</a>
                </li>
                <li>Find project proposal from the menu and click on it</li>
            <?php } else { ?>
                <li>Go to project proposal application portal <a style="color:#007bff !important;" href="<?php base_url() ?>user/dashboard/project-proposal"> [ Click Here ] </a>
                </li>
            <?php } ?>

            <li>Enter your project details & Submit your response</li>
            <li>Thats all</li>
        </ol>
    </div>
    <div class="row">
        <p style="font-size:1.3em !important;">
            For more details contact
            <br><br>

            <a style="color:#007bff !important;" href="tel:+918281582725">Thameem : 8281582725</a>
            <br>
            <a style="color:#007bff !important;" href="tel:+917559895470">Adil : 7559895470</a>
        </p>
    </div>
</div>