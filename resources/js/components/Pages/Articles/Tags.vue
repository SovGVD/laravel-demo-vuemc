<template>
    <ul class="tags">
        <li v-for="tag in tags" :key="tag.id">{{ tag.tag }}</li>
    </ul>
</template>

<script>
export default {
    props: {
        tags: {
            required: true,
            type: Array,
        }
    },
}
</script>
