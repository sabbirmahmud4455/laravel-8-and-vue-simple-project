<template lang="">
    <div>
        <div class="container">
            <div class=" d-flex p-1">
                <h4>Edit Product</h4>
                <router-link class='ml-auto btn btn-success' :to="{name:'product-index'}">Product List</router-link>
            </div>
            <hr>
            <div style="max-width:60%; margin: 0 auto; border:2px solid; padding:20px; ">
                <form @submit.prevent='update_product'>
                    <div class="form-group"><label for="product_name">Pdoruct Name</label>
                        <input type="text" name="name" v-model="Product_form.name" id="product_name" class="form-control" placeholder="Product Name"aria-describedby="helpId" :class="{ 'is-invalid': Product_form.errors.has('name') }">
                        <has-error :form="Product_form" field="name"></has-error>
                    </div>
                    <div class="form-group"><label for="product_title">Pdoruct Title</label>
                        <input type="text" name="title" v-model="Product_form.title" id="product_title" class="form-control" placeholder="Product Title"aria-describedby="helpId" :class="{ 'is-invalid': Product_form.errors.has('title') }">
                        <has-error :form="Product_form" field="title"></has-error>
                    </div>
                    <div class="form-group d-flex">
                        <div>
                            <label for="product_sales_price">Sales Price</label>
                            <input type="text" name="sales_price" v-model="Product_form.sales_price" id="product_sales_price" class="form-control" placeholder="Sales Price"aria-describedby="helpId" :class="{ 'is-invalid': Product_form.errors.has('sales_price') }">
                            <has-error :form="Product_form" field="sales_price"></has-error>
                        </div>
                        <div class='ml-4'>
                            <label for="product_cost_price">Cost Price</label>
                            <input type="text" name="cost_price" v-model="Product_form.cost_price" id="product_cost_price" class="form-control" placeholder="Cost Price"aria-describedby="helpId" :class="{ 'is-invalid': Product_form.errors.has('cost_price') }">
                            <has-error :form="Product_form" field="cost_price"></has-error>
                        </div>
                        <div class='ml-4'>
                            <label for="product_size">Product size</label>
                            <input type="text" name="product_size" v-model="Product_form.product_size" id="product_size" class="form-control" placeholder="Product size"aria-describedby="helpId" :class="{ 'is-invalid': Product_form.errors.has('product_size') }">
                            <has-error :form="Product_form" field="product_size"></has-error>
                        </div>
                    </div>
                    <div class="form-group"><label for="product_image">Product Image</label>
                        <!-- <input type="file" name="product_image" v-model="Product_form.product_image" id="product_image" class=" form-control-file"  aria-describedby="helpId" :class="{ 'is-invalid': Product_form.errors.has('product_image') }"> -->
                        <input type='file' class='form-control-file border p-1' name="product_image" >
                        <!-- <has-error :form="Product_form" field="product_image"></has-error> -->
                    </div>
                    <div class="form-group"><label for="short_description">Short Description</label>
                        <input type="text" name="short_description" v-model="Product_form.short_description" id="short_description" class="form-control" placeholder="Short Description"aria-describedby="helpId" :class="{ 'is-invalid': Product_form.errors.has('short_description') }">
                        <has-error :form="Product_form" field="short_description"></has-error>
                    </div>
                    <div class="form-group"><label for="long_description">Long Description</label>
                        <textarea name="long_description" v-model="Product_form.long_description" id="long_description" class="form-control" placeholder="Long Description"aria-describedby="helpId" :class="{ 'is-invalid': Product_form.errors.has('long_description') }">

                        </textarea>
                        <has-error :form="Product_form" field="long_description"></has-error>
                    </div>

                    <button type="submit" class="btn btn-block btn-primary">Update Product</button>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
    import {
        Form
    }

    from 'vform'


    export default {
        data() {
            return {
                Product_form: new Form({
                        name: '',
                        title: '',
                        sales_price: '',
                        cost_price: '',
                        product_size: '',
                        short_description: '',
                        long_description: ''
                        
                    }

                )
            }
        }

        ,
        methods: {
            get_edit_product(){
                let id = this.$route.params.id;
                
                axios.get(`/api/product/${id}+'/edit`).then(response =>{
                // this.CategoryData= response.data;
                //console.log(response);
                this.Product_form.name= response.data.name;
                this.Product_form.title= response.data.title;
                this.Product_form.sales_price= response.data.sales_price;
                this.Product_form.cost_price= response.data.cost_price;
                this.Product_form.product_size= response.data.product_size;
                this.Product_form.short_description= response.data.short_description;
                this.Product_form.long_description= response.data.long_description;
                
            })
            },
            update_product() {
                let id = this.$route.params.id;
                this.Product_form.put(`/api/product/${id}`).then(({
                            data
                        }

                    ) => {
                        this.$toast.success({
                            title: 'SUCCESS!',
                            message: 'Product Update Successfully'
                        })

                    }

                )
            }
        },
        mounted() {
           this.get_edit_product()
        }
    }

</script>
<style lang=""></style>
