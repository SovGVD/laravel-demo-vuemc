<template>
    <nav>
        <ul class="pagination">
            <li class="page-item" :class="{ 'disabled': !previousPage }">
                <router-link v-if="previousPage" :to="routeTo(previousPage)" class="page-link">Previous</router-link>
                <span class="page-link" v-else>Previous</span>
            </li>
            <li class="page-item" v-for="pageNum in lastPage" :key="pageNum" :class="{ 'active': pageNum == currentPage }">
                <router-link :to="routeTo(pageNum)" class="page-link">{{ pageNum }}</router-link>
            </li>
            <li class="page-item" :class="{ 'disabled': !nextPage }">
                <router-link v-if="nextPage" :to="routeTo(nextPage)" class="page-link">Next</router-link>
                <span class="page-link" v-else>Next</span>
            </li>
        </ul>
    </nav>
</template>

<script>
export default {
    props: {
        routePageParam: {
            require: true,
            type: String,
            default: 'pageNum',
        },
        currentPage: {
            required: true,
            type: Number,
        },
        lastPage: {
            required: true,
            type: Number,
        },
    },
    computed: {
        previousPage() {
            let pageNum = this.currentPage - 1;

            return pageNum < 1 ? null : pageNum;
        },
        nextPage() {
            let pageNum = this.currentPage + 1;

            return pageNum > this.lastPage ? null : pageNum;
        },
    },

    methods: {
        routeTo(pageNum) {
            const params = { ...this.$route.params };

            params[this.routePageParam] = pageNum;

            return {
                name: this.$route.name,
                params: params,
            };
        }
    },
}
</script>
