<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('DEV TOOL') }}
        </h2>
    </x-slot>
    <!-- This is supplemental component for CSS and JS for the RIS migration pages -->
    <x-ris_css_js/>
    <!-- This is the main entry point for the dev tool, multiple includes for various component-->
    <div class = "ajaxdata"></div>
    <div class="container admins" >
        <h5>Admininistration & Development Tool</h5>
        <ul class="centertabs">
                <li>
                <a href="#devtools">Development Tools</a>
                 </li>
                <li>
                <a href="#ris">RIS Configuration</a>
                 </li>
                 <li>
                <a href="#pacs">PACS / ORTHANC Configuration</a>
                 </li>
                 <li>
                <a href="#sns">Notification Service</a>
                 </li>
                 <li>
                <a href="#reporting_tools">Reporting Tools</a>
                 </li>
        </ul>

        <div id = "devtools">
            <x-devtoolmain/>
        </div>
        <x-devtool/>
</x-app-layout>
