<template lang="">
    <div>
        <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
            <div class='container'>
                <router-link class="navbar-brand" :to="{name:'home'}">Site Logo</router-link>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                    aria-expanded="false" aria-label="Toggle navigation"></button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item " >
                            <router-link class="nav-link" :to="{name:'home'}" >Home</router-link>
                        </li>
                        <li class="nav-item ">
                            <router-link class="nav-link" :to="{name:'categorys'}">Category</router-link>
                        </li>
                        <li class="nav-item ">
                            <router-link class="nav-link" :to="{name:'product-index'}">Prducts</router-link>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </div>
</template>
<script>
export default {
    
}
</script>
<style lang="">
    
</style>