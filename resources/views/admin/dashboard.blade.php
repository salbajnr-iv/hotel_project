<x-app-layout>
    @push('styles')
       <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
       <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
       <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    @endpush

    <style>
        /* Pro-Tier System Token Resets */
        .admin-workspace {
            background-color: #f8fafc;
            min-height: 100vh;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            letter-spacing: -0.01em;
            color: #1e293b;
        }

        /* Minimalist Utility Utilities */
        .text-muted-compact { color: #64748b; font-size: 0.875rem; }
        .text-brand-dark { color: #0f1521; }
        .bg-brand-dark { background-color: #0f1521; }
        
        /* Modernized Header Hub */
        .panel-hub-header {
            background: #0f1521;
            padding: 2.5rem 0;
            color: #ffffff;
            border-bottom: 3px solid #ff5252;
            box-shadow: 0 4px 20px rgba(15, 21, 33, 0.08);
        }
        .panel-title-main {
            font-size: 1.75rem;
            font-weight: 700;
            letter-spacing: -0.02em;
            color: #ffffff;
            margin: 0;
        }
        .panel-subtitle-main {
            color: #94a3b8;
            font-size: 0.95rem;
            margin-top: 0.35rem;
        }

        /* Clean Card Wrapper Isolation */
        .subnav-surface {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 1rem 1.25rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.02);
        }

        /* Production Metric & Action Grid Architecture */
        .app-action-node {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 1.75rem;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none !important;
            box-shadow: 0 1px 3px rgba(0,0,0,0.01), 0 10px 20px -12px rgba(0,0,0,0.03);
        }
        .app-action-node:hover {
            border-color: #cbd5e1;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(15, 21, 33, 0.05), 0 8px 10px -6px rgba(15, 21, 33, 0.03);
        }
        .app-action-node::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: transparent;
            border-radius: 12px 12px 0 0;
            transition: background-color 0.2s ease;
        }
        .app-action-node:hover::before {
            background: #ff5252;
        }

        /* Node Component Layouts */
        .node-top-row {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            width: 100%;
            margin-bottom: 1.25rem;
        }
        .node-badge-icon {
            width: 46px;
            height: 46px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            transition: all 0.2s;
        }
        .badge-accent { background-color: #fff5f5; color: #ff5252; }
        .badge-neutral { background-color: #f1f5f9; color: #475569; }
        
        .app-action-node:hover .badge-neutral {
            background-color: #0f1521;
            color: #ffffff;
        }

        .node-title-slug {
            font-size: 0.8rem;
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 0.05em;
            color: #64748b;
        }
        .node-display-heading {
            font-size: 1.35rem;
            font-weight: 700;
            color: #0f1521;
            margin-top: 0.25rem;
            line-height: 1.3;
        }
        
        .node-footer-trigger {
            font-size: 0.85rem;
            font-weight: 600;
            color: #ff5252;
            display: flex;
            align-items: center;
            margin-top: 1.5rem;
            padding-top: 0.75rem;
            border-top: 1px dashed #f1f5f9;
        }
        .node-footer-trigger i {
            transition: transform 0.2s ease;
        }
        .app-action-node:hover .node-footer-trigger i {
            transform: translateX(4px);
        }

        /* Footer Hub Matrix styling */
        .system-hub-footer {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.01);
        }
        .system-hub-footer h2 {
            font-size: 0.9rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #475569;
            margin-bottom: 1.25rem;
            display: flex;
            align-items: center;
        }
        .hub-pill-link {
            display: inline-flex;
            align-items: center;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 500;
            color: #334155;
            transition: all 0.2s;
            margin-right: 0.75rem;
            margin-bottom: 0.75rem;
        }
        .hub-pill-link:hover {
            background: #0f1521;
            color: #ffffff;
            border-color: #0f1521;
            text-decoration: none;
        }
        .hub-pill-link i {
            color: #94a3b8;
        }
        .hub-pill-link:hover i {
            color: #ff5252;
        }
    </style>

    <div class="admin-workspace">
        
        <!-- Application Control Center Header Banner -->
        <header class="panel-hub-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-sm-8">
                        <h1 class="panel-title-main">Control Panel</h1>
                        <p class="panel-subtitle-main">Central workspace to manage system records, hotel inventory parameters, and published assets.</p>
                    </div>
                </div>
            </div>
        </header>

        <main class="container py-5">
            <!-- System Sub-Navigation Layer -->
            <div class="row mb-5">
                <div class="col-12">
                    <div class="subnav-surface">
                        @include('admin._nav')
                    </div>
                </div>
            </div>

            <!-- Dashboard Analytics & Entry Matrices -->
            <div class="row g-4 mb-4">
                <!-- Node: Live Counter Metric -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="app-action-node">
                        <div>
                            <div class="node-top-row">
                                <span class="node-title-slug">Ledger Context</span>
                                <div class="node-badge-icon badge-accent">
                                    <i class="fa fa-calendar-check-o"></i>
                                </div>
                            </div>
                            <h3 class="node-display-heading">{{ $bookings_count }} Bookings</h3>
                            <p class="text-muted-compact mt-2">Active customer reservation records stored within the live transactional ledger index.</p>
                        </div>
                        <div class="node-footer-trigger text-muted">
                            <span class="text-muted-compact"><i class="fa fa-circle text-success mr-1.5" style="font-size:8px;"></i> Live Data Feed</span>
                        </div>
                    </div>
                </div>

                <!-- Node: Rooms Directory Management Module -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <a href="{{ route('admin.rooms.index') }}" class="app-action-node">
                        <div>
                            <div class="node-top-row">
                                <span class="node-title-slug">System Inventory</span>
                                <div class="node-badge-icon badge-neutral">
                                    <i class="fa fa-bed"></i>
                                </div>
                            </div>
                            <h3 class="node-display-heading">Suite Profiles</h3>
                            <p class="text-muted-compact mt-2">Create, modify, and delete inventory data fields, occupancy pricing structures, and categorical specifications.</p>
                        </div>
                        <div class="node-footer-trigger">
                            Open Rooms Management Engine <i class="fa fa-chevron-right ml-2" style="font-size: 10px;"></i>
                        </div>
                    </a>
                </div>

                <!-- Node: Image Assets Gallery Interface -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <a href="{{ route('admin.gallery.index') }}" class="app-action-node">
                        <div>
                            <div class="node-top-row">
                                <span class="node-title-slug">Application Content</span>
                                <div class="node-badge-icon badge-neutral">
                                    <i class="fa fa-picture-o"></i>
                                </div>
                            </div>
                            <h3 class="node-display-heading">Media Gallery</h3>
                            <p class="text-muted-compact mt-2">Upload visual digital assets, organize dynamic albums, and update structural text labels.</p>
                        </div>
                        <div class="node-footer-trigger">
                            Configure Display Media <i class="fa fa-chevron-right ml-2" style="font-size: 10px;"></i>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row g-4 mb-5">
                <!-- Node: Marketing Blog Editor -->
                <div class="col-md-6 mb-4">
                    <a href="{{ route('admin.blog.index') }}" class="app-action-node">
                        <div>
                            <div class="node-top-row">
                                <span class="node-title-slug">Marketing Channels</span>
                                <div class="node-badge-icon badge-neutral">
                                    <i class="fa fa-newspaper-o"></i>
                                </div>
                            </div>
                            <h3 class="node-display-heading">Article Composer</h3>
                            <p class="text-muted-compact mt-2">Draft, preview, and deploy promotional copy, public news posts, and customer informational logs directly onto the frontend engine.</p>
                        </div>
                        <div class="node-footer-trigger">
                            Launch Article Editor <i class="fa fa-chevron-right ml-2" style="font-size: 10px;"></i>
                        </div>
                    </a>
                </div>

                <!-- Node: Communications / Customer Message Center -->
                <div class="col-md-6 mb-4">
                    <a href="{{ route('admin.contact-messages.index') }}" class="app-action-node">
                        <div>
                            <div class="node-top-row">
                                <span class="node-title-slug">Customer Relations</span>
                                <div class="node-badge-icon badge-neutral">
                                    <i class="fa fa-envelope-open-o"></i>
                                </div>
                            </div>
                            <h3 class="node-display-heading">Inbound Inquiries</h3>
                            <p class="text-muted-compact mt-2">Inspect customer feedback channels, analyze contact form communications, and modify message fulfillment status tags.</p>
                        </div>
                        <div class="node-footer-trigger">
                            Review Communications Desk <i class="fa fa-chevron-right ml-2" style="font-size: 10px;"></i>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Unified Directory Quick Actions Map -->
            <div class="row">
                <div class="col-12">
                    <div class="system-hub-footer">
                        <h2><i class="fa fa-share-alt mr-2" style="color:#ff5252;"></i> Fast Path Command Routers</h2>
                        <div class="d-flex flex-wrap pt-1">
                            <a href="{{ route('admin.bookings.index') }}" class="hub-pill-link"><i class="fa fa-table mr-2"></i> Bookings Index</a>
                            <a href="{{ route('admin.rooms.index') }}" class="hub-pill-link"><i class="fa fa-sliders mr-2"></i> Suite Adjustments</a>
                            <a href="{{ route('admin.gallery.index') }}" class="hub-pill-link"><i class="fa fa-folder-open mr-2"></i> Asset Directories</a>
                            <a href="{{ route('admin.blog.index') }}" class="hub-pill-link"><i class="fa fa-pencil-square-o mr-2"></i> Copywriter Room</a>
                            <a href="{{ route('admin.contact-messages.index') }}" class="hub-pill-link m-0"><i class="fa fa-comments-o mr-2"></i> Messages Queue</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>