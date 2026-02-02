function JS_Blogs(baseUrl, module, controller) {
    this.module = module;
    this.baseUrl = baseUrl;
    this.controller = controller;
    NclLib.active('.link-blog');
    this.urlPath = baseUrl + '/' + module + '/' + controller;
    this.selectedFiles = []
}

/**
 * Hàm load các sử kiện cho màn hình index
 *
 * @return void
 */
JS_Blogs.prototype.loadIndex = function () {
    var myClass = this;
    var oForm = 'form#frmBlog_index';
    var oFormCreate = 'form#frmAdd';
    $('.chzn-select').chosen({ height: '100%', width: '100%' });
    myClass.loadList(oForm);

    $(oForm).find('#btn_add').click(function () {
        myClass.add(oForm);
    });
    $(oForm).find('#btn_edit').click(function () {
        myClass.edit(oForm);
    });
    // form load
    $(oForm).find('#category').change(function () {
        var page = $(oForm).find('#limit').val();
        var perPage = $(oForm).find('#cbo_nuber_record_page').val();
        myClass.loadList(oForm, page, perPage);
    });
    $(oForm).find('#txt_search').click(function () {
        var page = $(oForm).find('#limit').val();
        var perPage = $(oForm).find('#cbo_nuber_record_page').val();
        myClass.loadList(oForm, page, perPage);
        // return false;

    });
    // Xoa doi tuong
    $(oForm).find('#btn_delete').click(function () {
        myClass.delete(oForm)
    });
}
JS_Blogs.prototype.loadevent = function (oForm) {
    var myClass = this;
    $('form#frmAdd').find('#btn_create').click(function () {
        myClass.store('form#frmAdd');
    })
    $('form#frmAdd').find('#btn_changePass').click(function () {
        myClass.changePass('form#frmAdd');
    })
    $('form#frmChangePass').find('#btn_updatePass').click(function () {
        myClass.updatePass('form#frmChangePass');
    })

    $('#fileList').on('click', '.btn-remove-old', function () {
        $(this).closest('.preview-item').remove()
    })

    $('.btn_close').click(function () {
        myClass.selectedFiles = []
    })

    $('form#frmAdd').find('#title').on('input', function () {
        var title = $(this).val();
        $('#code_blog').val(title
            .toLowerCase()
            .normalize('NFD')
            .replace(/[\u0300-\u036f]/g, '')
            .replace(/đ/g, 'd')
            .replace(/[^a-z0-9\s-]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-')
            .replace(/^-+|-+$/g, '')
        );
    })

    $(document).find("#fileInput").on('change', (e) => {
        const files = Array.from(e.target.files)

        files.forEach(file => {
            if (!file.type.startsWith('image/')) return

            const exists = JS_Blogs.selectedFiles.some(f =>
                f.name === file.name && f.size === file.size
            )

            if (!exists) {
                JS_Blogs.selectedFiles.push(file)
            }
        })

        JS_Blogs.renderPreview()
        this.value = ''
    })
}
/**
 * Hàm hiển thị modal
 *
 * @param oForm (tên form)
 *
 * @return void
 */
JS_Blogs.prototype.add = function (oForm) {
    var url = this.urlPath + '/createForm';
    var myClass = this;
    var data = $(oForm).serialize();
    $.ajax({
        url: url,
        type: "POST",
        //cache: true,
        data: data,
        success: function (arrResult) {
            $('#editmodal').html(arrResult);
            $('#editmodal').modal('show');
            $('#status').attr('checked', true);
            $('.chzn-select').chosen({ height: '100%', width: '100%' });
            myClass.loadevent(oForm);
        }
    });
}
/**
 * Hàm hiển thêm mới
 *
 * @param oFormCreate (tên form)
 *
 * @return void
 */
JS_Blogs.prototype.store = function (oFormCreate) {
    var url = this.urlPath + '/create';
    var myClass = this;
    var formdata = new FormData();
    var check = myClass.checkValidate();
    if (check == false) {
        return false;
    }
    var status = ''
    $('input[name="status"]:checked').each(function () {
        status = $(this).val();
    });
    formdata.append('_token', $("#_token").val());
    formdata.append('id', $("#id").val());
    formdata.append('code_category', $("#code_category").val());
    formdata.append('code_blog', $("#code_blog").val());
    formdata.append('title', $("#title").val());
    formdata.append('decision', CKEDITOR.instances.decision.getData());
    formdata.append('status', status);

    myClass.selectedFiles.forEach(file => {
        formdata.append('files[]', file)
    })

    $('#fileList .old-image').each(function () {
        formdata.append('old_image[]', $(this).data('id'))
    })

    $.ajax({
        url: url,
        type: "POST",
        data: formdata,
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        success: function (arrResult) {
            if (arrResult['success'] == true) {
                NclLib.alertMessageBackend('success', 'Thông báo', 'Cập nhật thành công');
                $('#editmodal').modal('hide');
                myClass.selectedFiles = []
                myClass.loadList(oFormCreate);

            } else {
                var loadding = NclLib.successLoadding();
                NclLib.alertMessageBackend('danger', 'Lỗi', 'Cập nhật thất bại!');
            }
        }
    });
}
/**
 * Load màn hình danh sách
 *
 * @param oForm (tên form)
 *
 * @return void
 */
JS_Blogs.prototype.loadList = function (oForm, numberPage = 1, perPage = 15) {
    var myClass = this;
    var url = this.urlPath + '/loadList';
    var data = 'search=' + $("#search").val();
    data += '&category=' + $("#category").val();
    data += '&offset=' + numberPage;
    data += '&limit=' + perPage;
    $.ajax({
        url: url,
        type: "GET",
        // cache: true,
        data: data,
        success: function (arrResult) {
            $("#table-container").html(arrResult);
            // phan trang
            $(oForm).find('.main_paginate .pagination a').click(function () {
                var page = $(this).attr('page');
                var perPage = $('#cbo_nuber_record_page').val();
                myClass.loadList(oForm, page, perPage);
            });
            $(oForm).find('#cbo_nuber_record_page').change(function () {
                var page = $(oForm).find('#_currentPage').val();
                var perPages = $(oForm).find('#cbo_nuber_record_page').val();
                myClass.loadList(oForm, page, perPages);
            });
            $(oForm).find('#cbo_nuber_record_page').val(perPage);
            var loadding = NclLib.successLoadding();
            myClass.loadevent(oForm);
        }
    });
}
/**
 * Hàm hiển thị modal edit
 *
 * @param oForm (tên form)
 *
 * @return void
 */
JS_Blogs.prototype.edit = function (oForm) {
    var url = this.urlPath + '/edit';
    var myClass = this;
    var data = $(oForm).serialize();
    var listitem = '';
    var i = 0;
    var p_chk_obj = $('#table-data').find('input[name="chk_item_id"]');
    $(p_chk_obj).each(function () {
        if ($(this).is(':checked')) {
            if (listitem !== '') {
                listitem += ',' + $(this).val();
            } else {
                listitem = $(this).val();
            }
            i++;
        }
    });
    if (listitem == '') {
        var nameMessage = 'Bạn chưa chọn đối tượng!';
        var icon = 'warning';
        var color = '#344767';
        NclLib.alerMesage(nameMessage, icon, color);
        return false;
    }
    if (i > 1) {
        var nameMessage = 'Bạn chỉ được chọn một đối tượng!';
        var icon = 'warning';
        var color = '#344767';
        NclLib.alerMesage(nameMessage, icon, color);
        return false;
    }
    $.ajax({
        url: url,
        type: "POST",
        data: data,
        success: function (arrResult) {
            $('#editmodal').html(arrResult);
            $('#editmodal').modal('show');
            myClass.loadevent(oForm);

        }
    });
}
// Xoa bài viết
JS_Blogs.prototype.delete = function (oForm) {
    var myClass = this;
    var listitem = '';
    var p_chk_obj = $('#table-data').find('input[name="chk_item_id"]');
    $(p_chk_obj).each(function () {
        if ($(this).is(':checked')) {
            if (listitem !== '') {
                listitem += ',' + $(this).val();
            } else {
                listitem = $(this).val();
            }
        }
    });
    if (listitem == '') {
        var nameMessage = 'Bạn chưa chọn bài viết để xóa!';
        var icon = 'warning';
        var color = '#344767';
        //   var color = '#344767';
        NclLib.alerMesage(nameMessage, icon, color);
        return false;
    }
    var data = $(oForm).serialize();
    var url = this.urlPath + '/delete';
    Swal.fire({
        title: 'Bạn có chắc chắn xóa vĩnh viễn bài viết này không?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#34bd57',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xác nhận'
    }).then((result) => {
        if (result.isConfirmed == true) {
            $.ajax({
                url: url,
                type: "POST",
                dataType: 'json',
                data: {
                    _token: $('#_token').val(),
                    listitem: listitem,
                },
                success: function (arrResult) {
                    if (arrResult['success'] == true) {
                        if (result.isConfirmed) {
                            Swal.fire({
                                position: 'top-start',
                                icon: 'success',
                                title: 'Xóa thành công',
                                showConfirmButton: false,
                                timer: 3000
                            })
                            myClass.loadList(oForm);
                        }
                    } else {
                        if (result.isConfirmed) {
                            Swal.fire({
                                position: 'top-start',
                                icon: 'error',
                                title: 'Quá trình xóa đã xảy ra lỗi',
                                showConfirmButton: false,
                                timer: 3000
                            })
                        }
                    }
                }
            });
        }
    })
}
/**
 * Hàm hiển thị modal edit
 *
 * @param oForm (tên form)
 *
 * @return void
 */
JS_Blogs.prototype.infoBlog = function (id) {
    var url = this.urlPath + '/infor';
    var myClass = this;
    var data = 'id=' + id;
    var loadding = NclLib.successLoadding();
    $.ajax({
        url: url,
        type: "GET",
        data: data,
        success: function (arrResult) {
            $('#editPassmodal').html(arrResult);
            $('#editPassmodal').modal('show');
            myClass.loadevent(oForm);

        }
    });
}
/**
 * Hàm hiển thị modal edit
 *
 * @param oForm (tên form)
 *
 * @return void
 */
JS_Blogs.prototype.changePass = function (oForm) {
    var url = this.urlPath + '/changePass';
    var myClass = this;
    var data = 'id=' + $("#id").val();
    data += '&email=' + $("#email").val();
    var loadding = NclLib.successLoadding();
    $.ajax({
        url: url,
        type: "GET",
        data: data,
        success: function (arrResult) {
            $('#editPassmodal').html(arrResult);
            $('#editPassmodal').modal('show');
            myClass.loadevent(oForm);

        }
    });
}
/**
 * Cập nhật mật khẩu
 *
 * @param oFormCreate (tên form)
 *
 * @return void
 */
JS_Blogs.prototype.updatePass = function (oFormCreate) {
    var url = this.urlPath + '/updatePass';
    var myClass = this;
    var data = $(oFormCreate).serialize();
    if ($("#password_old").val() == '') {
        var nameMessage = 'Mật khẩu cũ không được để trống!';
        var icon = 'warning';
        var color = '#344767';
        NclLib.alerMesage(nameMessage, icon, color);
        return false;
    }
    if ($("#password_new").val() == '') {
        var nameMessage = 'Mật khẩu mới không được để trống!';
        var icon = 'warning';
        var color = '#344767';
        NclLib.alerMesage(nameMessage, icon, color);
        return false;
    }
    if ($("#password_retype_change").val() == '') {
        var nameMessage = 'Chưa nhập lại mật khẩu mới!';
        var icon = 'warning';
        var color = '#344767';
        NclLib.alerMesage(nameMessage, icon, color);
        return false;
    }
    $.ajax({
        url: url,
        type: "POST",
        //cache: true,
        data: data,
        success: function (arrResult) {
            if (arrResult['success'] == true) {
                var nameMessage = arrResult['message'];
                var icon = 'success';
                var color = '#344767';
                NclLib.alerMesage(nameMessage, icon, color);
                $('#editPassmodal').modal('hide');
                myClass.loadList(oFormCreate);
            } else {
                var nameMessage = arrResult['message'];
                var icon = 'warning';
                var color = '#344767';
                NclLib.alerMesage(nameMessage, icon, color);
            }
        }
    });

}
/**
 * Check
 */
JS_Blogs.prototype.checkValidate = function () {
    if ($("#code_category").val() == '') {
        NclLib.alertMessageBackend('warning', 'Cảnh báo', 'Thể loại không được để trống!');
        $("#code_category").focus();
        return false;
    }
    if ($("#title").val() == '') {
        NclLib.alertMessageBackend('warning', 'Cảnh báo', 'Tiêu đề không được để trống!');
        $("#title").focus();
        return false;
    }
    if (CKEDITOR.instances.decision.getData() == '') {
        NclLib.alertMessageBackend('warning', 'Cảnh báo', 'Nội dung không được để trống!');
        $("#decision").focus();
        return false;
    }
}

JS_Blogs.prototype.renderPreview = function() {
    var myClass = this
    const $list = $('#fileList')

    // remove preview cũ của file mới trước đó
    $list.find('.new-image').remove()

    JS_Blogs.selectedFiles.forEach((file, index) => {
        const div = document.createElement('div')
        div.className = 'preview-item new-image'

        const img = document.createElement('img')
        img.src = URL.createObjectURL(file)

        const btn = document.createElement('button')
        btn.innerText = '×'
        btn.onclick = () => myClass.removeFile(index)

        div.appendChild(img)
        div.appendChild(btn)
        $list.append(div)
    })
}

JS_Blogs.prototype.removeFile = function(index) {
    var myClass = this;
    JS_Blogs.selectedFiles.splice(index, 1)
    myClass.renderPreview()
}
