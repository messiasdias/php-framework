<template>
<div class="home">
    <h1>Error {{error}}</h1>
</div>
</template>
<script>
export default{
    name: "Http",
    props:{
        error: String
    }
}
</script>