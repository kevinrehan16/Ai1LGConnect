export const SkeletonComponent = {
    props: {
        rows: {
            type: Number,
            default: 5
        },
        columns: {
            type: Number,
            default: 5
        }
    },
    template: /* HTML */`
        <template v-if="true">
            <tr v-for="i in rows" :key="'skeleton-' + i" class="skeleton-row">
                <td v-for="c in columns" :key="c">
                    <div class="skeleton-text"></div>
                </td>
            </tr>
        </template>
    `
};