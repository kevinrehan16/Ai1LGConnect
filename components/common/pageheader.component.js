export const PageHeaderComponent = {
    props: ['title', 'breadcrumb', 'icon'],
    template: /* HTML */`
        <div class="page-header d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center text-primary">
                <i :class="icon + ' fs-3 me-2'"></i>
                <h3 class="page-title mb-0 text-uppercase">{{ title }}</h3>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li 
                        v-for="(item, index) in breadcrumb" 
                        :key="index"
                        class="breadcrumb-item"
                        :class="[{ active: index === breadcrumb.length - 1 }, 'text-capitalize']"
                    >
                        {{ item }}
                    </li>
                </ol>
            </nav>
        </div>
    `
};