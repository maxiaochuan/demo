<style lang="less">
    @import "../less/side.less";
</style>
<template>
    <aside>
        <div class="side-list" v-for="item in sideList">
            <span>{{item.itemList.name}}</span>
            <ul>
                <li v-for="item in item.itemList.list">{{item.name}}</li>
            </ul>
        </div>
    </aside>
</template>
<script>
    'use strict';
    module.exports = {
        data: function () {
            return {
                sideList: [
                    {
                        itemList: {
                            name: '库存管理',
                            list: [
                                {name: '库存管理1'},
                                {name: '库存管理2'},
                                {name: '库存管理3'},
                                {name: '库存管理4'}
                            ]
                        }
                    }
                ]
            };
        }
    }
</script>