console.log("Tracker script loaded! Sending visit data...");

(function() {
    function getVisitorId() {
        let visitorId = document.cookie.split('; ').find(row => row.startsWith('visitor_id='));
        if (!visitorId) {
            visitorId = 'visitor_' + Math.random().toString(36).substr(2, 9);
            document.cookie = `visitor_id=${visitorId}; path=/; max-age=${60 * 60 * 24 * 30}`; // 30 days
        } else {
            visitorId = visitorId.split('=')[1];
        }
        return visitorId;
    }

    function sendVisitData() {
        fetch('http://localhost:8000/api/track-visit', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                page_url: window.location.href,
                visitor_id: getVisitorId(),
                timestamp: new Date().toISOString()
            })
        }).catch(err => console.error('Tracking failed:', err));
    }

    sendVisitData();
})();

