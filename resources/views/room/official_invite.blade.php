<x-app-layout title="Room Invitation">
    <div class="min-h-[calc(100vh-180px)] flex flex-col items-center justify-center relative">
        <!-- Room Info Header (Optional but good for context) -->
        <div class="text-center mb-12">
            <h1 class="text-3xl font-black text-slate-900 dark:text-white mb-2">{{ $room->name }}</h1>
            <p class="text-slate-500 dark:text-slate-400 font-medium">Scan the QR code below to join this official room
            </p>
        </div>

        <!-- QR Code Centered Container -->
        <div class="relative group">
            <!-- Decorative Background Glow -->
            <div
                class="absolute -inset-4 bg-gradient-to-tr from-primary/20 to-secondary/20 rounded-[2.5rem] blur-2xl opacity-50 group-hover:opacity-100 transition-opacity duration-500">
            </div>

            <div
                class="relative bg-white dark:bg-slate-900 p-10 rounded-[2rem] border border-slate-200 dark:border-slate-800 shadow-2xl flex flex-col items-center justify-center gap-6 w-80 h-80 transition-transform duration-500 hover:scale-[1.02]">
                <div
                    class="size-full border-4 border-dashed border-slate-100 dark:border-slate-800 rounded-2xl flex flex-col items-center justify-center gap-4">
                    <div class="size-48 bg-slate-50 dark:bg-slate-800/50 rounded-xl flex items-center justify-center">
                        <img id="qr-code"src="" alt="">
                    </div>
                </div>

                <div
                    class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity bg-white/80 dark:bg-slate-900/80 rounded-[2rem] backdrop-blur-sm">
                    <p class="text-primary font-bold text-sm tracking-tight">QR Code Generation Pending</p>
                </div>
            </div>
        </div>

        <!-- Bottom Right Counter Placeholder -->
        <div class="absolute bottom-0 right-0">
            <div
                class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-4 rounded-2xl shadow-xl flex items-center gap-4 hover:border-primary/30 transition-all cursor-default">
                <div class="size-12 bg-primary/10 rounded-xl flex items-center justify-center text-primary">
                    <span class="material-symbols-outlined font-bold">group</span>
                </div>
                <div>
                    <div class="text-[10px] font-bold text-slate-400 uppercase tracking-widest leading-none mb-1">
                        Participants</div>
                    <div class="text-2xl font-black text-slate-900 dark:text-white tabular-nums leading-none">
                        0<span class="text-slate-300 dark:text-slate-600">/--</span>
                    </div>
                </div>
                <div class="ml-2 size-2 bg-green-500 rounded-full animate-ping"></div>
            </div>
        </div>
        <div id="output"></div>
    </div>
    <script>
        (function() {
            const img = document.getElementById('qr-code');
            const loadingState = document.getElementById('qr-loading-state');
            const outputEl = document.getElementById('output');
            
            function updateQr(data) {
                if (!img) return;
                img.src = `data:image/svg+xml;base64,${data}`;
                if (loadingState) {
                    loadingState.classList.add('opacity-0');
                    setTimeout(() => loadingState.style.display = 'none', 300);
                }
            }

            let attempts = 0;
            function attachListeners() {
                if (window.myAppEventSource) {
                    console.log("Global SSE stream found. Attaching QR listeners...");
                    
                    window.myAppEventSource.addEventListener('ping', function(event) {
                        console.log(event.data);
                        
                        updateQr(event.data);
                    });
                    
                    window.myAppEventSource.addEventListener('timer_tick', function(event) {
                        const data = JSON.parse(event.data);
                        console.log(data);
                        
                    });

                    window.myAppEventSource.onmessage = function(event) {
                        if(event.data.includes("status\":\"alive")) return;
                        try {
                            const data = JSON.parse(event.data);
                            if (outputEl) outputEl.innerText = JSON.stringify(data);
                        } catch(e) {}
                    }
                } else if (attempts < 50) {
                    attempts++;
                    // Try again in 100ms
                    setTimeout(attachListeners, 100);
                } else {
                    console.error("Global SSE stream (myAppEventSource) could not be initialized.");
                }
            }

            attachListeners();
        })();
    </script>
</x-app-layout>
