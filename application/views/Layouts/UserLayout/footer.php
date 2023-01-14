</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <!-- <a class="btn btn-primary" href="login.html">Logout</a> -->
                <a class="btn btn-primary" href="<?= site_url('Auth/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>
<!-- Custom scripts for all pages-->
<script src="<?= templates('js/sb-admin-2.min.js') ?>"></script>

<!-- Page level plugins -->
<script src="<?= templates('vendor/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= templates('vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>

<!-- Page level custom scripts -->
<script src="<?= templates('js/demo/datatables-demo.js') ?>"></script>

<!-- additional package for datatable -->
<script src="<?= datatable('Buttons-2.3.2/js/dataTables.buttons.min.js') ?>"></script>

<script src="<?= datatable('Buttons-2.3.2/js/buttons.bootstrap4.min.js') ?>"></script>

<script src="<?= datatable('Buttons-2.3.2/js/buttons.html5.min.js') ?>"></script>

<script src="<?= datatable('Buttons-2.3.2/js/buttons.print.min.js') ?>"></script>

<script src="<?= datatable('Buttons-2.3.2/js/buttons.colVis.min.js') ?>"></script>

<script src="<?= datatable('JSZip-2.5.0/jszip.min.js') ?>"></script>

<script src="<?= datatable('pdfmake-0.1.36/pdfmake.min.js') ?>"></script>

<script src="<?= datatable('pdfmake-0.1.36/vfs_fonts.js') ?>"></script>

</body>

</html>