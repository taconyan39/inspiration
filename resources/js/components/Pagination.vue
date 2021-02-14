<template>
<div>
    <ul class="p-pagination">
        <li class="p-pagination__item" v-if="hasPrev">
            <a class="p-pagination__link" href="#" @click.prevent="move(data.current_page-1)">前へ</a>
        </li>
        <li :class="getPageClass(page)" v-for="page in pages" :key="page.id">
            <a class="p-pagination__link" href="#" v-text="page" @click.prevent="move(page)"></a>
        </li>
        <li class="p-pagination__item" v-if="hasNext">
            <a class="p-pagination__link" href="#" @click.prevent="move(data.current_page+1)">次へ</a>
        </li>

    </ul>

</div>

</template>

<script>

export default {
    props: {
        page: 'page',
        data: {},  // paginate()で取得したデータ
    },
    methods: {
        move(page) {

            if(!this.isCurrentPage(page)) {

                this.$emit('move-page', page);

            }

        },
        isCurrentPage(page) {

            return (this.data.current_page == page);

        },
        getPageClass(page) {

            let classes = ['p-pagination__item'];

            if(this.isCurrentPage(page)) {

                classes.push('js-active');

            }

            return classes;

        }
    },
    computed: {
        hasPrev() {

            return (this.data.prev_page_url != null);

        },
        hasNext() {

            return (this.data.next_page_url != null);

        },
        pages() {

            let pages = [];

            for(let i = 1 ; i <= this.data.last_page ; i++) {

                pages.push(i);

            }

            return pages;

        }
    },
}
</script>