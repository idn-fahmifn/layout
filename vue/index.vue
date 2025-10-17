<script setup>
// Asumsi: AuthenticatedLayout sudah mengurus Sidebar/Navbar utama
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

const Task = [
  {task_name: 'Alice Smith', priority: 'High', date: '2023-10-26' },
  {task_name: 'Bob Johnson', priority: 'High', date: '2023-10-25' },
  {task_name: 'Charlie Brown', priority: 'Medium', date: '2023-10-25' },
  {task_name: 'Diana Prince', priority: 'Low', date: '2023-10-24' },
];

</script>

<template>
  <AuthenticatedLayout title="Dashboard">

    <Head title="Dashboard" />

    <div class="py-8 px-6 lg:px-8 bg-gray-50 min-h-screen">
      <div class="flex justify-between">
        <div class="">
          <h1 class="text-3xl font-bold text-gray-900 mb-6">Tasks</h1>
        </div>
        <div class="">
          <Link :href="route('task.create')"
            class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-gray-300 rounded-md font-semibold text-xs text-gray-200 uppercase tracking-widest shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
          Add New
          </Link>

        </div>
      </div>


      <div class="grid grid-cols-1 gap-6">

        <div class="lg:col-span-2">

          <div class="bg-white rounded-xl shadow-lg p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">All Tasks</h3>

            <div class="overflow-x-auto">
              <table class="min-w-full divide-y divide-gray-200 w-full">
                <thead class="bg-gray-50">
                  <tr>
                    <th scope="col"
                      class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Task Name</th>
                    <th scope="col"
                      class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Priority</th>
                    <th scope="col"
                      class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dateline</th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                  <tr v-for="task in Task" :key="task.id">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ task.task_name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                      <span :class="['px-2 inline-flex text-xs leading-5 font-semibold rounded-full', {
                        'bg-green-100 text-green-800': task.priority === 'Low',
                        'bg-blue-100 text-blue-800': task.priority === 'Medium',
                        'bg-red-100 text-red-800': task.priority === 'High',
                      }]">{{ task.priority }}</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ task.date }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>