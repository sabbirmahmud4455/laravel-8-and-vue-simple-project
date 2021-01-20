<template lang="">
    <div>
        <div class="container">
            <div class=" d-flex p-1">
                <h4>Edit Category</h4>
                <router-link class='ml-auto btn btn-success' :to="{name:'categorys'}">Category List</router-link>
            </div>
            <hr>
            <div style="max-width:60%; margin: 0 auto; border:2px solid; padding:20px; ">
                <form @submit.prevent='update_category'>
                    <div class="form-group"><label for="category_name">Category Name</label><input type="text"
                            name="name" v-model="Category_form.name" id="category_name" class="form-control"
                            placeholder="Category Name" aria-describedby="helpId"
                            :class="{ 'is-invalid': Category_form.errors.has('name') }">
                        <has-error :form="Category_form" field="name"></has-error>
                    </div>
                    <div class="form-group"><label for="category_description">Category Description</label><textarea
                            class="form-control" v-model="Category_form.description" name="description"
                            id="category_description" placeholder="Category Description" rows="6"></textarea></div>
                    <button type="submit" class="btn btn-block btn-primary">Action</button>
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
                Category_form: new Form({
                        name: '',
                        description: ''
                    }

                )
            }
        }

        ,
        methods: {
            get_edit_category(){
                let id = this.$route.params.id;
                
                axios.get(`/api/category/${id}+'/edit`).then(response =>{
                // this.CategoryData= response.data;
                //console.log(response);
                this.Category_form.name= response.data.name;
                this.Category_form.description= response.data.description;
            })
            },
            update_category() {
                let id = this.$route.params.id;
                this.Category_form.put(`/api/category/${id}`).then(({
                            data
                        }

                    ) => {
                        this.$toast.success({
                            title: 'SUCCESS!',
                            message: 'Category Update Succesfully'
                        })

                    }

                )
            }
        },
        mounted() {
           this.get_edit_category()
        }

    }

</script>
<style lang=""></style>
