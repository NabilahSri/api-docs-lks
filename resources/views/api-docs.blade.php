<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>API Docs - {{ config('app.name', 'LKS MART') }}</title>
    <style>
        :root {
            color-scheme: dark;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, "Apple Color Emoji", "Segoe UI Emoji";
            background: radial-gradient(900px 420px at 10% 0%, rgba(96, 165, 250, .18), transparent 55%),
                radial-gradient(900px 420px at 90% 20%, rgba(167, 139, 250, .18), transparent 55%),
                radial-gradient(900px 420px at 50% 100%, rgba(251, 113, 133, .14), transparent 55%),
                #0b1020;
            color: #e7eaf3;
            overflow-x: hidden;
        }

        .wrap {
            max-width: 980px;
            margin: 0 auto;
            padding: 28px 16px 56px;
        }

        @media (max-width: 520px) {
            .wrap {
                padding: 18px 12px 44px;
            }
        }

        .top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            flex-wrap: wrap;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 0;
            flex: 1 1 auto;
        }

        .logo {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: linear-gradient(135deg, #60a5fa, #a78bfa, #fb7185);
        }

        h1 {
            margin: 0;
            font-size: clamp(16px, 3.5vw, 20px);
            letter-spacing: 0.2px;
        }

        .sub {
            margin: 6px 0 0;
            color: #a7b0cc;
            font-size: 13px;
        }

        .pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
            border: 1px solid rgba(255, 255, 255, .12);
            background: rgba(255, 255, 255, .06);
            padding: 10px 12px;
            border-radius: 12px;
            font-size: 13px;
            color: #cfd6ee;
            max-width: 100%;
        }

        .pill .v {
            max-width: 100%;
            overflow-wrap: anywhere;
            word-break: break-word;
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 14px;
            margin-top: 22px;
        }

        @media (min-width: 900px) {
            .grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        .card {
            border: 1px solid rgba(255, 255, 255, .12);
            background: rgba(255, 255, 255, .06);
            border-radius: 16px;
            padding: 18px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, .28);
            backdrop-filter: blur(10px);
            min-width: 0;
        }

        @media (max-width: 520px) {
            .card {
                padding: 14px;
            }
        }

        .card h2 {
            margin: 0 0 10px;
            font-size: 14px;
            color: #e7eaf3;
        }

        .row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            flex-wrap: wrap;
        }

        .endpoint {
            display: flex;
            gap: 10px;
            align-items: center;
            flex-wrap: wrap;
            min-width: 0;
        }

        .method {
            font-weight: 700;
            font-size: 12px;
            padding: 6px 10px;
            border-radius: 10px;
            letter-spacing: .4px;
        }

        .m-post {
            background: rgba(59, 130, 246, .18);
            border: 1px solid rgba(59, 130, 246, .35);
            color: #93c5fd;
        }

        .m-get {
            background: rgba(34, 197, 94, .15);
            border: 1px solid rgba(34, 197, 94, .35);
            color: #86efac;
        }

        .path {
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            font-size: 12px;
            color: #e7eaf3;
            overflow-wrap: anywhere;
            word-break: break-word;
            min-width: 0;
        }

        .meta {
            color: #a7b0cc;
            font-size: 12px;
        }

        .kv {
            display: grid;
            grid-template-columns: 140px 1fr;
            gap: 8px 14px;
            margin-top: 10px;
            font-size: 12px;
        }

        @media (max-width: 520px) {
            .kv {
                grid-template-columns: 1fr;
            }
        }

        .k {
            color: #a7b0cc;
        }

        .v {
            color: #e7eaf3;
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
        }

        pre {
            margin: 12px 0 0;
            padding: 12px;
            border-radius: 14px;
            background: rgba(0, 0, 0, .35);
            border: 1px solid rgba(255, 255, 255, .10);
            overflow: auto;
            font-size: 12px;
            line-height: 1.4;
            max-width: 100%;
        }

        a {
            color: #93c5fd;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .note {
            margin-top: 18px;
            color: #a7b0cc;
            font-size: 12px;
        }

        .tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-left: 0;
            font-size: 12px;
            padding: 6px 10px;
            border-radius: 999px;
            border: 1px solid rgba(255, 255, 255, .12);
            background: rgba(255, 255, 255, .06);
            color: #cfd6ee;
        }

        .try {
            margin-top: 18px;
        }

        .split {
            display: grid;
            grid-template-columns: 1fr;
            gap: 14px;
        }

        @media (min-width: 900px) {
            .split {
                grid-template-columns: 1fr 1fr;
            }
        }

        .stack {
            display: grid;
            gap: 14px;
            min-width: 0;
        }

        .form {
            display: grid;
            gap: 10px;
            margin-top: 10px;
        }

        .fieldset {
            border: 1px solid rgba(255, 255, 255, .12);
            background: rgba(0, 0, 0, .18);
            border-radius: 16px;
            padding: 14px;
            min-width: 0;
        }

        .legend {
            font-size: 12px;
            color: #cfd6ee;
            margin: 0 0 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            flex-wrap: wrap;
        }

        .controls {
            display: grid;
            grid-template-columns: 1fr;
            gap: 10px;
        }

        @media (min-width: 600px) {
            .controls {
                grid-template-columns: 1fr 1fr;
            }
        }

        .field {
            display: grid;
            gap: 6px;
        }

        label {
            font-size: 12px;
            color: #a7b0cc;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 10px 12px;
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, .12);
            background: rgba(255, 255, 255, .06);
            color: #e7eaf3;
            font-size: 13px;
            outline: none;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: rgba(147, 197, 253, .55);
            box-shadow: 0 0 0 3px rgba(147, 197, 253, .14);
        }

        input::placeholder {
            color: rgba(231, 234, 243, .55);
        }

        textarea {
            resize: vertical;
            min-height: 44px;
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            line-height: 1.35;
        }

        .btns {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            align-items: center;
            margin-top: 10px;
        }

        @media (max-width: 520px) {
            .btns button {
                flex: 1 1 100%;
            }
        }

        button {
            border: 1px solid rgba(255, 255, 255, .12);
            background: rgba(255, 255, 255, .06);
            color: #e7eaf3;
            padding: 10px 12px;
            border-radius: 12px;
            cursor: pointer;
            font-size: 13px;
            transition: transform .06s ease, background-color .12s ease, border-color .12s ease, opacity .12s ease;
        }

        button:hover {
            border-color: rgba(255, 255, 255, .22);
        }

        button:active {
            transform: translateY(1px);
        }

        button.primary {
            background: rgba(59, 130, 246, .18);
            border-color: rgba(59, 130, 246, .35);
            color: #93c5fd;
        }

        button.good {
            background: rgba(34, 197, 94, .15);
            border-color: rgba(34, 197, 94, .35);
            color: #86efac;
        }

        button.warn {
            background: rgba(251, 191, 36, .12);
            border-color: rgba(251, 191, 36, .28);
            color: #fde68a;
        }

        button.danger {
            background: rgba(239, 68, 68, .12);
            border-color: rgba(239, 68, 68, .28);
            color: #fecaca;
        }

        button:disabled {
            opacity: .55;
            cursor: not-allowed;
        }

        .resp {
            margin-top: 10px;
            min-width: 0;
        }

        .status {
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            font-size: 12px;
            color: #cfd6ee;
            opacity: .95;
        }

        .muted {
            color: #a7b0cc;
            font-size: 12px;
        }

        .span-all {
            grid-column: 1 / -1;
        }

        .spacer-10 {
            height: 10px;
        }

        .spacer-12 {
            height: 12px;
        }
    </style>
</head>

<body>
    <div class="wrap">
        <div class="top">
            <div class="brand">
                <div class="logo"></div>
                <div>
                    <h1>API Documentation</h1>
                    <div class="sub">{{ config('app.name', 'LKS MART') }} — JWT Auth (Role: pelanggan)</div>
                </div>
            </div>
            <div class="pill">
                <span>Base URL</span>
                <span class="v">{{ rtrim(request()->getSchemeAndHttpHost(), '/') }}</span>
            </div>
        </div>

        <div class="card try">
            <h2>Try It</h2>
            <div class="muted">Jalankan request langsung dari halaman ini. Token disimpan otomatis di browser
                (localStorage).</div>

            <div class="form">
                <div class="fieldset">
                    <div class="legend">
                        <span>Token</span>
                        <span class="status" id="token-status">Token: -</span>
                    </div>
                    <div class="controls">
                        <div class="field span-all">
                            <label for="token-input">Bearer Token</label>
                            <textarea id="token-input" rows="3" placeholder="Paste token di sini (tanpa 'Bearer ')"></textarea>
                        </div>
                        <div class="btns span-all">
                            <button class="good" id="token-save">Simpan Token</button>
                            <button class="danger" id="token-clear">Hapus Token</button>
                            <button id="token-copy">Copy Token</button>
                        </div>
                    </div>
                </div>

                <div class="split">
                    <div class="stack">
                        <div class="fieldset">
                            <div class="legend">
                                <span>Register</span>
                                <span class="muted">POST /api/auth/register</span>
                            </div>

                            <div class="controls">
                                <div class="field">
                                    <label for="reg-name">Nama</label>
                                    <input id="reg-name" placeholder="Nama Lengkap" />
                                </div>
                                <div class="field span-all">
                                    <label for="reg-address">Alamat</label>
                                    <input id="reg-address" placeholder="Alamat" />
                                </div>
                                <div class="field">
                                    <label for="reg-email">Email</label>
                                    <input id="reg-email" placeholder="email@example.com" />
                                </div>
                                <div class="field">
                                    <label for="reg-password">Password</label>
                                    <input id="reg-password" type="password" placeholder="min 8 karakter" />
                                </div>
                                <div class="field">
                                    <label for="reg-password2">Konfirmasi Password</label>
                                    <input id="reg-password2" type="password" placeholder="min 8 karakter" />
                                </div>
                                <div class="btns span-all">
                                    <button class="primary" id="btn-register">POST /auth/register</button>
                                    <button id="fill-register">Isi contoh</button>
                                </div>
                            </div>

                            <div class="resp">
                                <div class="status" id="register-status">Status: -</div>
                                <pre id="register-response">{}</pre>
                            </div>
                        </div>

                        <div class="fieldset">
                            <div class="legend">
                                <span>Login</span>
                                <span class="muted">POST /api/auth/login</span>
                            </div>

                            <div class="controls">
                                <div class="field">
                                    <label for="login-email">Email</label>
                                    <input id="login-email" placeholder="pelanggan1@example.com" />
                                </div>
                                <div class="field">
                                    <label for="login-password">Password</label>
                                    <input id="login-password" type="password" placeholder="password123" />
                                </div>
                                <div class="btns span-all">
                                    <button class="primary" id="btn-login">POST /auth/login</button>
                                    <button id="fill-login">Isi seed</button>
                                </div>
                            </div>

                            <div class="resp">
                                <div class="status" id="login-status">Status: -</div>
                                <pre id="login-response">{}</pre>
                            </div>
                        </div>
                    </div>

                    <div class="fieldset">
                        <div class="legend">
                            <span>Product</span>
                            <span class="muted">Butuh Bearer token + role pelanggan</span>
                        </div>

                        <div class="btns">
                            <button class="good" id="btn-me">GET /auth/me</button>
                            <button class="warn" id="btn-refresh">POST /auth/refresh</button>
                            <button class="danger" id="btn-logout">POST /auth/logout</button>
                        </div>

                        <div class="spacer-10"></div>

                        <div class="btns span-all">
                            <button class="good" id="btn-products">GET /products</button>
                        </div>

                        <div class="spacer-10"></div>

                        <div class="controls">
                            <div class="field">
                                <label for="prod-id">Product ID</label>
                                <input id="prod-id" type="number" min="1" value="1" />
                            </div>
                            <div class="btns span-all">
                                <button class="good" id="btn-product-detail">GET /products/{id}</button>
                            </div>
                        </div>

                        <div class="resp">
                            <div class="status" id="api-status">Status: -</div>
                            <pre id="api-response">{}</pre>
                        </div>
                    </div>
                </div>

                <div class="spacer-10"></div>

                <div class="fieldset">
                    <div class="legend">
                        <span>Transaction</span>
                        <span class="muted">Butuh Bearer token + role pelanggan</span>
                    </div>

                    <div class="controls">
                        <div class="field span-all">
                            <label>Items (Product & Qty)</label>
                            <div id="trx-items-list" class="stack" style="gap: 8px;">
                                <div class="trx-item-row" style="display: flex; gap: 8px;">
                                    <select class="trx-p-id" style="width: 50%;">
                                        <option value="">Pilih Produk</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }} (Stok:
                                                {{ $product->stock }})</option>
                                        @endforeach
                                    </select>
                                    <input type="number" class="trx-p-qty" placeholder="Qty" value="1"
                                        min="1" style="width: 50%;" />
                                    <button type="button" class="danger btn-remove-item"
                                        style="padding: 0 12px; display: none;">X</button>
                                </div>
                            </div>
                            <div style="margin-top: 8px;">
                                <button type="button" id="btn-add-item"
                                    style="font-size: 12px; padding: 6px 10px;">+ Tambah Item</button>
                            </div>
                        </div>
                        <div class="btns span-all">
                            <button class="primary" id="btn-trx-store">POST /transactions</button>
                        </div>
                    </div>

                    <div class="spacer-10"></div>

                    <div class="controls">
                        <div class="field">
                            <label for="trx-id">Transaction ID</label>
                            <input id="trx-id" type="number" min="1" value="1" />
                        </div>
                        <div class="btns span-all">
                            <button class="good" id="btn-trx-detail">GET /transactions/{id}</button>
                            <button class="good" id="btn-trx-list">GET /transactions</button>
                        </div>
                    </div>

                    <div class="resp">
                        <div class="status" id="trx-status">Status: -</div>
                        <pre id="trx-response">{}</pre>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid">
            <div class="card">
                <h2>Autentikasi</h2>

                <div class="row">
                    <div class="endpoint">
                        <span class="method m-post">POST</span>
                        <span class="path">/api/auth/register</span>
                    </div>
                    <div class="meta">Role otomatis: pelanggan</div>
                </div>
                <div class="kv">
                    <div class="k">Body</div>
                    <div class="v">name, address, email, password, password_confirmation</div>
                </div>
                <pre>curl -X POST "{{ rtrim(request()->getSchemeAndHttpHost(), '/') }}/api/auth/register" \
  -H "Content-Type: application/json" \
  -d "{\"name\":\"Pelanggan 1\",\"address\":\"Jl. Pelanggan 1\",\"email\":\"pelanggan1@example.com\",\"password\":\"password123\",\"password_confirmation\":\"password123\"}"</pre>

                <div class="spacer-12"></div>

                <div class="row">
                    <div class="endpoint">
                        <span class="method m-post">POST</span>
                        <span class="path">/api/auth/login</span>
                    </div>
                    <div class="meta">Hanya pelanggan yang boleh login</div>
                </div>
                <div class="kv">
                    <div class="k">Body</div>
                    <div class="v">email, password</div>
                </div>
                <pre>curl -X POST "{{ rtrim(request()->getSchemeAndHttpHost(), '/') }}/api/auth/login" \
  -H "Content-Type: application/json" \
  -d "{\"email\":\"pelanggan1@example.com\",\"password\":\"password123\"}"</pre>

                <div class="spacer-12"></div>

                <div class="row">
                    <div class="endpoint">
                        <span class="method m-get">GET</span>
                        <span class="path">/api/auth/me</span>
                        <span class="tag">Bearer token</span>
                    </div>
                </div>
                <pre>curl "{{ rtrim(request()->getSchemeAndHttpHost(), '/') }}/api/auth/me" \
  -H "Authorization: Bearer &lt;token&gt;"</pre>

                <div style="height: 12px;"></div>

                <div class="row">
                    <div class="endpoint">
                        <span class="method m-post">POST</span>
                        <span class="path">/api/auth/logout</span>
                        <span class="tag">Bearer token</span>
                    </div>
                </div>
                <pre>curl -X POST "{{ rtrim(request()->getSchemeAndHttpHost(), '/') }}/api/auth/logout" \
  -H "Authorization: Bearer &lt;token&gt;"</pre>

                <div class="spacer-12"></div>

                <div class="row">
                    <div class="endpoint">
                        <span class="method m-post">POST</span>
                        <span class="path">/api/auth/refresh</span>
                        <span class="tag">Bearer token</span>
                    </div>
                </div>
                <pre>curl -X POST "{{ rtrim(request()->getSchemeAndHttpHost(), '/') }}/api/auth/refresh" \
  -H "Authorization: Bearer &lt;token&gt;"</pre>
            </div>

            <div class="card">
                <h2>Produk</h2>

                <div class="row">
                    <div class="endpoint">
                        <span class="method m-get">GET</span>
                        <span class="path">/api/products</span>
                        <span class="tag">Bearer token</span>
                    </div>
                    <div class="meta">List produk</div>
                </div>
                <pre>curl "{{ rtrim(request()->getSchemeAndHttpHost(), '/') }}/api/products" \
  -H "Authorization: Bearer &lt;token&gt;"</pre>

                <div class="spacer-12"></div>

                <div class="row">
                    <div class="endpoint">
                        <span class="method m-get">GET</span>
                        <span class="path">/api/products/{id}</span>
                        <span class="tag">Bearer token</span>
                    </div>
                    <div class="meta">Detail produk</div>
                </div>
                <pre>curl "{{ rtrim(request()->getSchemeAndHttpHost(), '/') }}/api/products/1" \
  -H "Authorization: Bearer &lt;token&gt;"</pre>

                <div class="note">
                    Field utama: <span class="v">id, name, price, image_url, rating, stock</span>
                </div>
            </div>

            <div class="card">
                <h2>Transaksi</h2>

                <div class="row">
                    <div class="endpoint">
                        <span class="method m-post">POST</span>
                        <span class="path">/api/transactions</span>
                        <span class="tag">Bearer token</span>
                    </div>
                    <div class="meta">Buat transaksi baru</div>
                </div>
                <div class="kv">
                    <div class="k">Body</div>
                    <div class="v">items (array of {product_id, qty})</div>
                </div>
                <pre>curl -X POST "{{ rtrim(request()->getSchemeAndHttpHost(), '/') }}/api/transactions" \
  -H "Authorization: Bearer &lt;token&gt;" \
  -H "Content-Type: application/json" \
  -d "{\"items\":[{\"product_id\":1,\"qty\":2}]}"</pre>

                <div class="spacer-12"></div>

                <div class="row">
                    <div class="endpoint">
                        <span class="method m-get">GET</span>
                        <span class="path">/api/transactions</span>
                        <span class="tag">Bearer token</span>
                    </div>
                    <div class="meta">Riwayat transaksi</div>
                </div>
                <pre>curl "{{ rtrim(request()->getSchemeAndHttpHost(), '/') }}/api/transactions" \
  -H "Authorization: Bearer &lt;token&gt;"</pre>

                <div class="spacer-12"></div>

                <div class="row">
                    <div class="endpoint">
                        <span class="method m-get">GET</span>
                        <span class="path">/api/transactions/{id}</span>
                        <span class="tag">Bearer token</span>
                    </div>
                    <div class="meta">Detail invoice</div>
                </div>
                <pre>curl "{{ rtrim(request()->getSchemeAndHttpHost(), '/') }}/api/transactions/1" \
  -H "Authorization: Bearer &lt;token&gt;"</pre>
            </div>
        </div>

        <div class="note">
            Jika butuh response disesuaikan untuk UI (misalnya <span class="v">price_formatted</span> atau
            struktur tanpa wrapper tambahan), bilang format yang diinginkan.
        </div>
    </div>

    <script>
        const API_BASE = (window.location && window.location.origin) ?
            window.location.origin :
            @json(rtrim(request()->getSchemeAndHttpHost(), '/'));
        const TOKEN_KEY = 'lks_api_token';

        const elTokenInput = document.getElementById('token-input');
        const elTokenStatus = document.getElementById('token-status');
        const elRegisterStatus = document.getElementById('register-status');
        const elRegisterResp = document.getElementById('register-response');
        const elLoginStatus = document.getElementById('login-status');
        const elLoginResp = document.getElementById('login-response');
        const elApiStatus = document.getElementById('api-status');
        const elApiResp = document.getElementById('api-response');
        const elTrxStatus = document.getElementById('trx-status');
        const elTrxResp = document.getElementById('trx-response');

        function formatJson(value) {
            try {
                if (typeof value === 'string') return value;
                return JSON.stringify(value, null, 2);
            } catch (e) {
                return String(value);
            }
        }

        function getToken() {
            return localStorage.getItem(TOKEN_KEY) || '';
        }

        function setToken(token) {
            const t = (token || '').trim();
            if (!t) {
                localStorage.removeItem(TOKEN_KEY);
                elTokenInput.value = '';
                elTokenStatus.textContent = 'Token: -';
                return;
            }
            localStorage.setItem(TOKEN_KEY, t);
            elTokenInput.value = t;
            elTokenStatus.textContent = 'Token: tersimpan';
        }

        async function apiRequest(method, path, body, useAuth) {
            const headers = {
                'Accept': 'application/json',
            };
            if (body !== null && body !== undefined) {
                headers['Content-Type'] = 'application/json';
            }
            if (useAuth) {
                const token = getToken();
                if (token) headers['Authorization'] = 'Bearer ' + token;
            }

            const url = API_BASE.replace(/\/+$/, '') + path;
            const res = await fetch(url, {
                method,
                headers,
                body: body !== null && body !== undefined ? JSON.stringify(body) : undefined,
            });
            const text = await res.text();
            let data = text;
            try {
                data = text ? JSON.parse(text) : null;
            } catch (e) {}
            return {
                status: res.status,
                ok: res.ok,
                data
            };
        }

        function setStatus(el, status, ok) {
            el.textContent = 'Status: ' + status;
            el.style.color = ok ? '#86efac' : '#fecaca';
        }

        function setResponse(el, data) {
            el.textContent = formatJson(data ?? {});
        }

        function maybeStoreTokenFromResponse(data) {
            if (data && typeof data === 'object' && data.access_token) {
                setToken(String(data.access_token));
            }
        }

        setToken(getToken());

        document.getElementById('token-save').addEventListener('click', () => setToken(elTokenInput.value));
        document.getElementById('token-clear').addEventListener('click', () => setToken(''));
        document.getElementById('token-copy').addEventListener('click', async () => {
            const token = getToken();
            if (!token) return;
            try {
                await navigator.clipboard.writeText(token);
                elTokenStatus.textContent = 'Token: dicopy';
            } catch (e) {
                elTokenStatus.textContent = 'Token: gagal copy';
            }
        });

        document.getElementById('fill-register').addEventListener('click', () => {
            const suffix = String(Date.now()).slice(-6);
            document.getElementById('reg-name').value = 'Pelanggan ' + suffix;
            document.getElementById('reg-address').value = 'Jl. Pelanggan ' + suffix;
            document.getElementById('reg-email').value = 'pelanggan' + suffix + '@example.com';
            document.getElementById('reg-password').value = 'password123';
            document.getElementById('reg-password2').value = 'password123';
        });

        document.getElementById('fill-login').addEventListener('click', () => {
            document.getElementById('login-email').value = 'pelanggan1@example.com';
            document.getElementById('login-password').value = 'password123';
        });

        document.getElementById('btn-register').addEventListener('click', async () => {
            const body = {
                name: document.getElementById('reg-name').value,
                address: document.getElementById('reg-address').value,
                email: document.getElementById('reg-email').value,
                password: document.getElementById('reg-password').value,
                password_confirmation: document.getElementById('reg-password2').value,
            };
            const result = await apiRequest('POST', '/api/auth/register', body, false);
            setStatus(elRegisterStatus, result.status, result.ok);
            setResponse(elRegisterResp, result.data);
            maybeStoreTokenFromResponse(result.data);
        });

        document.getElementById('btn-login').addEventListener('click', async () => {
            const body = {
                email: document.getElementById('login-email').value,
                password: document.getElementById('login-password').value,
            };
            const result = await apiRequest('POST', '/api/auth/login', body, false);
            setStatus(elLoginStatus, result.status, result.ok);
            setResponse(elLoginResp, result.data);
            maybeStoreTokenFromResponse(result.data);
        });

        document.getElementById('btn-me').addEventListener('click', async () => {
            const result = await apiRequest('GET', '/api/auth/me', null, true);
            setStatus(elApiStatus, result.status, result.ok);
            setResponse(elApiResp, result.data);
        });

        document.getElementById('btn-logout').addEventListener('click', async () => {
            const result = await apiRequest('POST', '/api/auth/logout', null, true);
            setStatus(elApiStatus, result.status, result.ok);
            setResponse(elApiResp, result.data);
            if (result.ok) setToken('');
        });

        document.getElementById('btn-refresh').addEventListener('click', async () => {
            const result = await apiRequest('POST', '/api/auth/refresh', null, true);
            setStatus(elApiStatus, result.status, result.ok);
            setResponse(elApiResp, result.data);
            maybeStoreTokenFromResponse(result.data);
        });

        document.getElementById('btn-products').addEventListener('click', async () => {
            const result = await apiRequest('GET', '/api/products', null, true);
            setStatus(elApiStatus, result.status, result.ok);
            setResponse(elApiResp, result.data);
        });

        document.getElementById('btn-product-detail').addEventListener('click', async () => {
            const id = document.getElementById('prod-id').value;
            const path = '/api/products/' + encodeURIComponent(id);
            const result = await apiRequest('GET', path, null, true);
            setStatus(elApiStatus, result.status, result.ok);
            setResponse(elApiResp, result.data);
        });

        document.getElementById('btn-add-item').addEventListener('click', () => {
            const container = document.getElementById('trx-items-list');
            const firstRow = container.querySelector('.trx-item-row');
            const newRow = firstRow.cloneNode(true);
            newRow.querySelector('.trx-p-id').value = '';
            newRow.querySelector('.trx-p-qty').value = '1';
            const btnRemove = newRow.querySelector('.btn-remove-item');
            btnRemove.style.display = 'block';
            container.appendChild(newRow);

            btnRemove.addEventListener('click', () => {
                newRow.remove();
            });
        });

        document.getElementById('btn-trx-store').addEventListener('click', async () => {
            const rows = document.querySelectorAll('.trx-item-row');
            const items = [];

            rows.forEach(row => {
                const pid = parseInt(row.querySelector('.trx-p-id').value);
                const qty = parseInt(row.querySelector('.trx-p-qty').value);
                if (!isNaN(pid) && !isNaN(qty) && pid > 0 && qty > 0) {
                    items.push({
                        product_id: pid,
                        qty: qty
                    });
                }
            });

            if (items.length === 0) {
                setStatus(elTrxStatus, 'Error', false);
                setResponse(elTrxResp, {
                    error: 'Minimal 1 item dengan Product ID dan Qty yang valid'
                });
                return;
            }

            const body = {
                items
            };
            const result = await apiRequest('POST', '/api/transactions', body, true);
            setStatus(elTrxStatus, result.status, result.ok);
            setResponse(elTrxResp, result.data);
        });

        document.getElementById('btn-trx-detail').addEventListener('click', async () => {
            const id = document.getElementById('trx-id').value;
            const path = '/api/transactions/' + encodeURIComponent(id);
            const result = await apiRequest('GET', path, null, true);
            setStatus(elTrxStatus, result.status, result.ok);
            setResponse(elTrxResp, result.data);
        });

        document.getElementById('btn-trx-list').addEventListener('click', async () => {
            const result = await apiRequest('GET', '/api/transactions', null, true);
            setStatus(elTrxStatus, result.status, result.ok);
            setResponse(elTrxResp, result.data);
        });
    </script>
</body>

</html>
