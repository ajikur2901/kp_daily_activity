<x-app-layout>
    <div
        class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
        <div class="w-full mb-1 md:flex md:justify-between">
            <div class="mb-4">
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Timeline</h1>
                <nav class="flex mb-5" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                        <li class="inline-flex items-center">
                            <a href="{{ route('home')}}"
                                class="inline-flex items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
                                <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                    </path>
                                </svg>
                                Home
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500"
                                    aria-current="page">Project</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="m-6 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div id="gantt"></div>
    </div>

    <x-slot:content-style>
        
        <link rel="stylesheet" href="https://cdn3.devexpress.com/jslib/23.1.3/css/dx.light.css">
        <link rel="stylesheet" href="https://cdn3.devexpress.com/jslib/23.1.3/css/dx-gantt.min.css">
    </x-slot:content-style>

    <x-slot:content-script-head>
        
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                
        <!-- DevExtreme library -->
        <script type="text/javascript" src="https://cdn3.devexpress.com/jslib/23.1.3/js/dx-gantt.min.js"></script>
        <script type="text/javascript" src="https://cdn3.devexpress.com/jslib/23.1.3/js/dx.all.js"></script>
    </x-slot:content-script-head>

    <x-slot:content-script>
        <script type="module">
            const tasks = {{Illuminate\Support\Js::from($tasks)}};
    
    const dependencies = [{
    id: 1,
    predecessorId: 3,
    successorId: 4,
    type: 0,
    }, {
    id: 2,
    predecessorId: 4,
    successorId: 5,
    type: 0,
    }, {
    id: 3,
    predecessorId: 5,
    successorId: 6,
    type: 0,
    }, {
    id: 4,
    predecessorId: 6,
    successorId: 7,
    type: 0,
    }, {
    id: 5,
    predecessorId: 7,
    successorId: 9,
    type: 0,
    }, {
    id: 6,
    predecessorId: 9,
    successorId: 10,
    type: 0,
    }, {
    id: 7,
    predecessorId: 10,
    successorId: 11,
    type: 0,
    }, {
    id: 8,
    predecessorId: 11,
    successorId: 12,
    type: 0,
    }, {
    id: 9,
    predecessorId: 12,
    successorId: 13,
    type: 0,
    }, {
    id: 10,
    predecessorId: 13,
    successorId: 14,
    type: 0,
    }, {
    id: 11,
    predecessorId: 14,
    successorId: 15,
    type: 0,
    }, {
    id: 12,
    predecessorId: 15,
    successorId: 16,
    type: 0,
    }, {
    id: 13,
    predecessorId: 16,
    successorId: 17,
    type: 0,
    }, {
    id: 14,
    predecessorId: 17,
    successorId: 19,
    type: 0,
    }, {
    id: 15,
    predecessorId: 19,
    successorId: 20,
    type: 0,
    }, {
    id: 16,
    predecessorId: 20,
    successorId: 21,
    type: 0,
    }, {
    id: 17,
    predecessorId: 21,
    successorId: 22,
    type: 0,
    }, {
    id: 18,
    predecessorId: 22,
    successorId: 23,
    type: 0,
    }, {
    id: 19,
    predecessorId: 23,
    successorId: 24,
    type: 0,
    }, {
    id: 20,
    predecessorId: 24,
    successorId: 25,
    type: 0,
    }, {
    id: 21,
    predecessorId: 25,
    successorId: 27,
    type: 0,
    }, {
    id: 22,
    predecessorId: 27,
    successorId: 28,
    type: 0,
    }, {
    id: 23,
    predecessorId: 28,
    successorId: 29,
    type: 0,
    }, {
    id: 24,
    predecessorId: 29,
    successorId: 30,
    type: 0,
    }, {
    id: 25,
    predecessorId: 31,
    successorId: 32,
    type: 0,
    }, {
    id: 26,
    predecessorId: 37,
    successorId: 38,
    type: 0,
    }, {
    id: 27,
    predecessorId: 38,
    successorId: 39,
    type: 0,
    }, {
    id: 28,
    predecessorId: 39,
    successorId: 40,
    type: 0,
    }, {
    id: 29,
    predecessorId: 40,
    successorId: 41,
    type: 0,
    }, {
    id: 30,
    predecessorId: 41,
    successorId: 42,
    type: 0,
    }, {
    id: 31,
    predecessorId: 42,
    successorId: 44,
    type: 0,
    }, {
    id: 32,
    predecessorId: 44,
    successorId: 45,
    type: 0,
    }, {
    id: 33,
    predecessorId: 45,
    successorId: 46,
    type: 0,
    }, {
    id: 34,
    predecessorId: 46,
    successorId: 47,
    type: 0,
    }, {
    id: 35,
    predecessorId: 47,
    successorId: 48,
    type: 0,
    }, {
    id: 36,
    predecessorId: 53,
    successorId: 54,
    type: 0,
    }, {
    id: 37,
    predecessorId: 54,
    successorId: 55,
    type: 0,
    }, {
    id: 38,
    predecessorId: 55,
    successorId: 56,
    type: 0,
    }, {
    id: 39,
    predecessorId: 56,
    successorId: 57,
    type: 0,
    }, {
    id: 40,
    predecessorId: 59,
    successorId: 60,
    type: 0,
    }, {
    id: 41,
    predecessorId: 60,
    successorId: 61,
    type: 0,
    }, {
    id: 42,
    predecessorId: 61,
    successorId: 62,
    type: 0,
    }, {
    id: 43,
    predecessorId: 63,
    successorId: 64,
    type: 0,
    }, {
    id: 44,
    predecessorId: 64,
    successorId: 65,
    type: 0,
    }, {
    id: 45,
    predecessorId: 65,
    successorId: 66,
    type: 0,
    }, {
    id: 46,
    predecessorId: 66,
    successorId: 67,
    type: 0,
    }, {
    id: 47,
    predecessorId: 69,
    successorId: 70,
    type: 0,
    }, {
    id: 48,
    predecessorId: 70,
    successorId: 71,
    type: 0,
    }, {
    id: 49,
    predecessorId: 71,
    successorId: 72,
    type: 0,
    }, {
    id: 50,
    predecessorId: 72,
    successorId: 73,
    type: 0,
    }, {
    id: 51,
    predecessorId: 73,
    successorId: 74,
    type: 0,
    }, {
    id: 52,
    predecessorId: 74,
    successorId: 76,
    type: 0,
    }, {
    id: 53,
    predecessorId: 76,
    successorId: 77,
    type: 0,
    }, {
    id: 54,
    predecessorId: 77,
    successorId: 78,
    type: 0,
    }, {
    id: 55,
    predecessorId: 78,
    successorId: 79,
    type: 0,
    }, {
    id: 56,
    predecessorId: 79,
    successorId: 80,
    type: 0,
    }, {
    id: 57,
    predecessorId: 80,
    successorId: 81,
    type: 0,
    }, {
    id: 58,
    predecessorId: 81,
    successorId: 83,
    type: 0,
    }, {
    id: 59,
    predecessorId: 83,
    successorId: 84,
    type: 0,
    }, {
    id: 60,
    predecessorId: 84,
    successorId: 85,
    type: 0,
    }, {
    id: 61,
    predecessorId: 85,
    successorId: 86,
    type: 0,
    }, {
    id: 62,
    predecessorId: 86,
    successorId: 87,
    type: 0,
    }];
    
    const resources = {{Illuminate\Support\Js::from($resources)}};
    
    const resourceAssignments = {{Illuminate\Support\Js::from($resourceAssignments)}};

$(document).ready(function(){
    $('#gantt').dxGantt({
        tasks: {
        dataSource: tasks,
        },
        dependencies: {
            dataSource: dependencies,
        },
        resources: {
            dataSource: resources,
        },
        resourceAssignments: {
            dataSource: resourceAssignments,
        },
        editing: {
            enabled: false,
        },
        validation: {
            autoUpdateParentTasks: true,
        },
        toolbar: {
        items: [
            'collapseAll',
            'expandAll',
            'separator',
            'zoomIn',
            'zoomOut',
        ],
        },
        columns: [
            {
                dataField: 'title',
                caption: 'Subject',
            }
        ],
        scaleType: 'weeks',
        taskListWidth: 500,
    });
})
        </script>
    </x-slot:content-script>

</x-app-layout>