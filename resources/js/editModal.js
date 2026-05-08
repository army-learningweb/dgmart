export default function editModal() {
    // User
    $(document).on("click", ".open-modal-edit", function () {
        let modal_name = $(this).data("modal");
        let module = $(this).data("module");
        let id = $(this).data("id");
        let data = { id: id };
        let type = $(this).data("type") ?? '';
        
        let url = ''
        if(type == 'categories' || type == 'variants' || type == 'attributes'){
            url = `/admin/${module}/${type}/edit`
        }else{
            url = `/admin/${module}/edit`
        }
        
        $.ajax({
            type: "get",
            url: url,
            data: data,
            dataType: "json",
            success: function (data) {
                
                const modal = $(".modal-" + modal_name);
                const inputs = {
                    name: modal.find("input[name=name]"),
                    code: modal.find("input[name=code]"),
                    email: modal.find("input[name=email]"),
                    price: modal.find("input[name=price]"),
                    sale_off: modal.find("input[name=sale_off]"),
                    slug: modal.find("input[name=slug]"),
                    id : modal.find("input[name=id]"),
                    quantity : modal.find("input[name=quantity]"),
                    textarea_desc : modal.find("textarea[name=desc]"),
                    textarea_title : modal.find("textarea[name=title]")
                }

                // attributes
                if (module == 'products' && type == 'attributes'){
                    inputs.name.val(data.attribute.name);
                    inputs.textarea_desc.val(data.attribute.desc);
                    inputs.id.val(data.attribute.id);
                    data.variants.forEach(variant_id => {
                        modal.find(`input[value=${variant_id}]`).prop('checked',true);
                    });
                }        

                // variant
                if (module == 'products' && type == 'variants'){
                    inputs.name.val(data.name);
                    inputs.slug.val(data.slug);
                    inputs.price.val(data.price);
                    inputs.textarea_desc.val(data.desc);
                    inputs.id.val(data.id);
                }        

                // menu
                if(module == 'menus'){
                    inputs.id.val(data.id);
                    modal.find('input[name=link-name]').val(data.name);
                    modal.find(`option[value=${data.parent_id}]`).prop('selected',true);
                    modal.find('input[name=is_parent]').val(data.parent_id);
                    modal.find('.parent_id').prop('disabled',data.parent_id == 0);
                }

                // slider
                if(module == 'sliders'){
                    console.log(data);
                    inputs.textarea_title.val(data.slider_info.title);
                    inputs.textarea_desc.val(data.slider_info.desc);
                    inputs.id.val(data.slider_info.id);
                    modal.find('input[name=redirect]').val(data.slider_info.redirect);
                    modal.find('input[name=order]').val(data.slider_info.order);
                    modal.find('img').attr('src',data.img_url).removeClass('hidden');
                    modal.find('input[name=old-slider-file-id]').val(data.old_slider_file_id);
                    modal.find('.fake-remove-file').removeClass('hidden');
                }

                // product
                if(module == 'products' && !type){
                    inputs.id.val(data.product_info.id);
                    inputs.name.val(data.product_info.name);
                    inputs.code.val(data.product_info.code);
                    inputs.textarea_desc.val(data.product_info.desc);
                    inputs.price.val(data.product_info.price);
                    inputs.sale_off.val(data.product_info.sale_off);
                    inputs.slug.val(data.product_info.slug);
                    inputs.quantity.val(data.product_info.quantity);
                    modal.find('img.product-file-img').attr('src',data.img_url).removeClass('hidden').parents('div.relative').find('.fake-remove-file').removeClass('hidden');
                    modal.find('input[name=old-product-file-id]').val(data.old_product_file_id);
                    modal.find(`select#category_id option[value=${data.product_info.category_id}]`).prop('selected',true);
                    modal.find(`select#up_sales option[value=${data.product_info.up_sales}]`).prop('selected',true);
                    data.detail_imgs.forEach((element ,index) => {
                        modal.find(`img.product-subfile-${index + 1}-img`).attr('src',element.url).removeClass('hidden').parents('div.relative').find('.fake-remove-file').removeClass('hidden');
                        modal.find(`input[name=old-product-subfile-${index + 1}-id]`).val(element.id);
                    });
                    if (data.product_info.details) {
                        tinymce.get('edit-product-content').setContent(data.product_info.details);
                    }
                   
                    modal.find(`select option[value=${data.product_info.attribute_id}]`).prop('selected',true);
                    
                    let view_variants = modal.find('.attribute_variant_check').html(data.view_variants);
                    if(view_variants){
                        data.product_variant_values.forEach(id => {
                            modal.find(`input[value=${id}]`).prop('checked',true);
                        });
                    }
                }

                // post
                if(module == 'posts' && !type){
                    inputs.textarea_title.val(data.post_info.title);
                    inputs.textarea_desc.val(data.post_info.desc);
                    inputs.id.val(data.post_info.id);
                    inputs.slug.val(data.post_info.slug);
                    modal.find('img').attr('src',data.img_url).removeClass('hidden');
                    modal.find('input[name=old-post-file-id]').val(data.old_post_file_id);
                    modal.find(`option[value=${data.post_info.category_id}]`).prop('selected',true);
                    modal.find('.fake-remove-file').removeClass('hidden');
                    if (data.post_info.content) {
                    tinymce.get('edit-post-content').setContent(data.post_info.content);
    }
                    
                }
                
                // categories
                if ((module == 'posts' || module == 'products') && type == 'categories'){
                    inputs.name.val(data.category_info.name);
                    inputs.slug.val(data.category_info.slug);
                    inputs.id.val(data.category_info.id);     
                    modal.find('input[name=is_parent]').val(data.category_info.parent_id);
                    modal.find(`option[value=${data.category_info.parent_id}]`).prop('selected',true);
                    modal.find('select[name=parent_category]').prop('disabled',data.category_info.parent_id == 0 ? true : '');

                    if(data.img_url){
                        modal.find('img').attr('src',data.img_url).removeClass('hidden');
                        modal.find('input[name=old-category-file-id]').val(data.old_category_file_id);
                        modal.find('.fake-remove-file').removeClass('hidden');
                    }        
                }        
                
                // user
                if (module == "users") {
                    inputs.name.val(data.user_info.name);
                    inputs.email.val(data.user_info.email);
                    inputs.id.val(data.user_info.id);
                    data.roles.forEach(id => {
                        modal.find(`option[value=${id}]`).prop('selected',true);
                    });
                }

                // permission
                if (module == 'permissions'){
                    inputs.name.val(data.name);
                    inputs.slug.val(data.slug);
                    inputs.textarea_desc.val(data.desc);
                    inputs.id.val(data.id);
                }

                // role
                if (module == 'roles'){
                    inputs.name.val(data.role.name);
                    inputs.textarea_desc.val(data.role.desc);
                    inputs.id.val(data.role.id);
                    data.permissions.forEach(permission_id => {
                        modal.find(`input[value=${permission_id}]`).prop('checked',true);
                    });
                }
            },
        });
    });
}
