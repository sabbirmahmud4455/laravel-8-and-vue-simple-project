<template lang="">
    <div>
        <div class="container">
            <div class=" d-flex p-1">
                <h4>Create Product</h4>
                <router-link class='ml-auto btn btn-success' :to="{name:'product-index'}">Product List</router-link>
            </div>
            <hr>
            <div style="max-width:60%; margin: 0 auto; border:2px solid; padding:20px; ">
                <form @submit.prevent='create_product'>
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
                    <div class="form-group">
                        <label for="">Product Image</label>
                        <input type="file" class="form-control-file"  @change="onImageChange" :class="{ 'is-invalid': Product_form.errors.has('image') }">
                         <has-error :form="Product_form" field="image"></has-error>
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

                    <button type="submit" class="btn btn-block btn-primary">Create Product</button>
                </form>
            </div>
        </div>
    </div>
</template>
<script>

import { Form } from 'vform'

import { objectToFormData } from 'object-to-formdata'

    export default {
        data() {
            return {
                Product_form: new Form({
                        name: '',
                        title: '',
                        sales_price: '',
                        cost_price: '',
                        image: '',
                        product_size: '',
                        short_description: '',
                        long_description: '',
                        
                    }

                )
            }
        }

        ,
        methods: {
            create_product() {
this.Product_form.post('/api/product', {
                transformRequest: [function (data, headers) {
                    return objectToFormData(data)
                }],
                onUploadProgress: e => {
                    // Do whatever you want with the progress event
                    console.log(e)
                }
            }).then(({ data }) => {
                this.Product_form.name= '',
                        this.Product_form.title= '',
                        this.Product_form.sales_price= '',
                        this.Product_form.cost_price= '',
                        this.Product_form.product_size= '',
                        this.Product_form.image= '',
                        this.Product_form.short_description= '',
                        this.Product_form.long_description= '',

                        this.$toast.success({
                            title: 'SUCCESS!',
                            message: data
                        })
            })
        },
        onImageChange(e){
            const file = e.target.files[0]
            // Do some client side validation...
            this.Product_form.image = file
        }

        }

        ,
    }

</script>
<style lang=""></style>
