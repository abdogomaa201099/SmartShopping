<template>
<div @click.prevent="addToCart">
</div>
</template>

<script>
export default {
    name:"AddToCartButton",
    methods: {
        addToCart(){
            alert('add')
        }
    }
}
</script>

<style scoped>

</style>