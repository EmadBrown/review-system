<template>
    <div>
        <star-rating v-model="rating" active-color="black" :increment="1" :rating="rating" :round-start-rating="false" :rtl="true"></star-rating> {{rating}}
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
