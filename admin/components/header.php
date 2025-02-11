


<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="confirmationModalLabel">Confirmation</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" id="close-btn" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="confirm-btn" class="btn btn-primary">Yes</button>
            </div>
        </div>
    </div>
</div>

<header class="border-bottom  py-2" id="header">
    <div class="row align-items-center justify-content-between position-relative">
        <div class="col-auto ">
            <i class="fa-solid fa-bars fs-5 cursor-pointer"></i>
        </div>
        <div class="col-auto row align-items-center ">
            <div class="user-btn col-auto row column-gap-2 align-items-center px-3 mx-0 cursor-pointer">
                <div class="col-auto px-0">
                    <img
                        src="../src/img/user.png"
                        onerror="this.onerror=null;this.src='../src/img/user.png';"
                        class=" rounded-circle user-pic" alt="User Pic">
                </div>
                <div class="col-auto px-0 d-sm-block d-none">
                    <p class="m-0"><?php echo $user_data['name'] ?></p>
                </div>
            </div>
        </div>
        <div class="user-dialog-box border border-2 border-dark-subtle rounded-3 px-0 shadow">
            <div class="user-details py-3 rounded-top-3">
                <div class="row justify-content-center">
                    <div class="col-auto">
                        <img src="../src/img/user.png"
                            onerror="this.onerror=null;this.src='../src/img/user.png';"
                            class="rounded-circle " width="80px" height="80px" alt="User Pic">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-auto">
                        <p class="my-0 text-center">
                            Super Admin
                        </p>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-auto">
                        <p class="my-0 mt-1" style="font-size: 12px;">
                            Admin Since <?php echo date('d M, Y', strtotime($user_data['created_at'])) ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="actions bg-light rounded-bottom-3">
                <div class="row justify-content-center py-2">
                    <div class="col-auto">
                        <a href="logout.php" class="btn btn-outline-dark ">Sign out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>