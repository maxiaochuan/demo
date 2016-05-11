<style lang="less">
    @import "../less/side.less";

    /* 必需 */
    .expand-transition {
        transition: all .5s ease;
        height: 30px;
        overflow: hidden;
    }

    /* .expand-enter 定义进入的开始状态 */
    /* .expand-leave 定义离开的结束状态 */
    .expand-enter, .expand-leave {
        height: 0;
        opacity: 0;
    }
</style>
<template>
    <aside>
        <!--<input type="text" v-model="hhh">-->
        <div class="side-list" v-for="list in sideList">
            <span class="divider" @click="show">{{list.name}}</span>
            <ul>
                <!--<li v-show="list.flag" v-for="item in list.list" transition="expand" stagger="10">{{item.name}}</li>-->
                <!--<li v-for="item in list.list | filterBy hhh" transition="expand" stagger="140">{{item.name}}</li>-->
                <li v-show="list.flag" v-for="item in list.list" transition="expand" stagger="140">{{item.name}}</li>
            </ul>
        </div>
    </aside>
</template>
<script>
    'use strict';
    module.exports = {
        data: function () {
            return {
//                hhh: '',
                sideList: [
                    {
                        name: '库存管理',
                        flag: false,
                        list: [
                            {name: '库存管理1'},
                            {name: '库存管理2'},
                            {name: '库存管理3'},
                            {name: '库存管理4'}
                        ]
                    },
                    {
                        name: '库存管理',
                        flag: false,
                        list: [
                            {name: '库存管理1'},
                            {name: '库存管理2'},
                            {name: '库存管理3'},
                            {name: '库存管理4'}
                        ]
                    }
                ]
            };
        },
        methods: {
            show: function (e) {
                var divider = document.getElementsByClassName('divider');
                for (let i = 0; i < divider.length; i++) {
                    if (e.target == divider[i]) {
                        this.sideList[i].flag = this.sideList[i].flag ? false : true;
                    }
                }
            }
        }
    }
</script>