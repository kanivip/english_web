<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\vocabularies;
class vocabulariesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $words = [
            "absolute" => "tuyệt đối",
            "access" => "truy cập",
            "account" => "tài khoản",
            "accumulator" => "pin, ắc quy",
            "acronym" => "chữ viết tắt",
            "action" => "hành động",
            "active" => "trạng thái hoạt động",
            "adapter" => "bộ chuyển đổi",
            "add" => "cộng, thêm",
            "address" => "địa chỉ",
            "advance" => "nâng cao",
            "adware" => "phần mềm quảng cáo",
            "affiliate" => "liên kết",
            "aggregate" => "tổng hợp",
            "agile" => "linh hoạt",
            "agnostic" => "bất khả tri",
            "alert" => "cảnh báo",
            "algorithm" => "thuật toán",
            "alias" => "bí danh",
            "alphanumeric" => "chữ số",
            "ambient" => "xung quanh",
            "analog" => "tương tự, liền mạch",
            "analytical" => "phân tích",
            "animate" => "hoạt hình",
            "anode" => "cực dương",
            "antivirus" => "chống virus",
            "app" => "ứng dụng",
            "application" => "ứng dụng",
            "approximate" => "gần đúng",
            "architecture" => "kiến trúc",
            "archive" => "lưu trữ",
            "argument" => "tham số",
            "arithmetic" => "số học",
            "array" => "mảng",
            "artificial" => "nhân tạo",
            "ascii" => "mã ascii",
            "aspect" => "khía cạnh",
            "assembly" => "ngôn ngữ máy",
            "associative" => "kết hợp",
            "asymmetric" => "bất đối xứng",
            "asynchronous" => "không đồng bộ",
            "attachment" => "đính kèm",
            "audio" => "âm thanh",
            "audit" => "kiểm tra",
            "authentication" => "xác thực",
            "authorization" => "phân quyền",
            "automate" => "tự động",
            "availability" => "khả dụng",
            "avatar" => "hình đại diện",
            "back" => "quay lại",
            "backbone" => "xương sống",
            "background" => "nền",
            "backlink" => "liên kết trở về",
            "backside" => "mặt sau",
            "backslash" => "dấu gạch chéo ngược",
            "backspace" => "lùi lại",
            "backup" => "sao lưu",
            "balance" => "cân tải, số dư",
            "bandwidth" => "băng thông",
            "banner" => "biểu ngữ",
            "barcode" => "mã vạch",
            "bare" => "trần, nguyên bản",
            "base" => "căn cứ, nền tảng",
            "basic" => "căn bản",
            "batch" => "lô",
            "baud" => "1 bit/s",
            "benchmark" => "điểm chuẩn",
            "bezel" => "khung, viền, mép",
            "binary" => "nhị phân",
            "bind" => "trói buộc",
            "biometric" => "sinh trắc học",
            "biotechnology" => "công nghệ sinh học",
            "blacklist" => "danh sách đen",
            "block" => "khối",
            "bold" => "in đậm",
            "bookmark" => "đánh dấu trang",
            "boot" => "khởi động",
            "botnet" => "mạng tự động",
            "bottleneck" => "nút thắt cổ chai",
            "bounce" => "bật lại",
            "bracket" => "dấu ngoặc",
            "brain" => "đầu não",
            "branch" => "nhánh",
            "breadcrumb" => "đường dẫn",
            "break" => "thoát khỏi",
            "bridge" => "cầu nối",
            "broadband" => "băng thông rộng",
            "broadcast" => "phát sóng",
            "broker" => "người môi giới, trung gian",
            "browser" => "trình duyệt",
            "bubble" => "bong bóng",
            "buffer" => "bộ đệm",
            "bug" => "lỗi",
            "build" => "xây dựng",
            "bulletin" => "bản tin",
            "burn" => "đốt cháy, ghi đĩa",
            "bus" => "kết nối bus",
            "business" => "nghiệp vụ",
            "cable" => "cáp",
            "cache" => "bộ nhớ cache",
            "calculator" => "máy tính",
            "calibration" => "hiệu chuẩn",
            "camelcase" => "viết hoa ký tự đầu",
            "camera" => "máy ảnh",
            "campus" => "khuôn viên",
            "canonical" => "kinh điển",
            "capacity" => "sức chứa",
            "captcha" => "ảnh captcha",
            "capture" => "chụp lại",
            "card" => "thẻ",
            "carriage" => "xuống dòng",
            "catalog" => "mục lục",
            "cathode" => "cực âm",
            "cell" => "ô",
            "cellular" => "di động",
            "certificate" => "chứng chỉ",
            "change" => "thay đổi",
            "channel" => "kênh",
            "chaos" => "hỗn loạn",
            "char" => "ký tự",
            "character" => "ký tự",
            "cheat" => "lừa đảo",
            "check" => "kiểm tra",
            "checksum" => "chuỗi kiểm tra",
            "circuit" => "mạch",
            "citation" => "trích dẫn",
            "class" => "lớp",
            "clean" => "dọn dẹp",
            "click" => "nhấp chuột",
            "client" => "khách",
            "clip" => "cắt",
            "clipboard" => "bộ nhớ clipboard",
            "clock" => "đồng hồ",
            "clone" => "nhân bản",
            "close" => "đóng",
            "closure" => "đóng kín",
            "cloud" => "đám mây",
            "cluster" => "cụm",
            "coaxial" => "đồng trục",
            "code" => "mã",
            "collaborative" => "hợp tác",
            "collision" => "va chạm, xung đột",
            "column" => "cột",
            "combinatorial" => "tổ hợp",
            "command" => "lệnh",
            "comment" => "bình luận, chú thích",
            "common" => "chung",
            "communication" => "giao tiếp",
            "community" => "cộng đồng",
            "compact" => "gọn nhẹ, nén",
            "compile" => "biên dịch",
            "compiler" => "trình biên dịch",
            "component" => "thành phần",
            "compound" => "tổ hợp",
            "compression" => "nén",
            "compute" => "tính toán",
            "computer" => "máy vi tính",
            "concatenation" => "nối",
            "concentrator" => "bộ tập trung",
            "concurrent" => "đồng thời",
            "conditional" => "có điều kiện",
            "conference" => "hội nghị",
            "configuration" => "cấu hình",
            "connect" => "kết nối",
            "console" => "bàn điều khiển",
            "constant" => "hằng số",
            "constructor" => "bộ khởi tạo",
            "contact" => "liên lạc",
            "content" => "nội dung",
            "contextual" => "theo ngữ cảnh",
            "contiguous" => "tiếp giáp",
            "continuation" => "tiếp tục",
            "control" => "điều khiển",
            "controller" => "bộ điều khiển",
            "cookie" => "cookie trình duyệt",
            "coordinate" => "tọa độ",
            "coprocessor" => "cùng xử lý",
            "copy" => "sao chép",
            "copyright" => "bản quyền",
            "count" => "đếm",
            "coupling" => "khớp nối, lệ thuộc",
            "courseware" => "giáo trình số",
            "crash" => "ngừng hoạt động",
            "cron" => "cron job",
            "crop" => "cắt tỉa",
            "cross" => "vượt qua",
            "cryptography" => "mật mã",
            "cumulative" => "tích lũy",
            "curly" => "ngoặc nhọn",
            "cursor" => "con trỏ",
            "customer" => "khách hàng",
            "cut" => "cắt",
            "cyberbullying" => "đe doạ trực tuyến",
            "cybercrime" => "tội phạm mạng",
            "cyberspace" => "không gian mạng",
            "dashboard" => "bảng điều khiển",
            "data" => "dữ liệu",
            "database" => "cơ sở dữ liệu",
            "dead" => "chết",
            "deadlock" => "bế tắc",
            "debug" => "gỡ rối",
            "debugger" => "trình sửa lỗi",
            "decimal" => "thập phân",
            "declare" => "khai báo",
            "decouple" => "tách riêng",
            "deductive" => "suy luận",
            "default" => "mặc định",
            "defragment" => "chống phân mảnh",
            "delete" => "xóa",
            "demographics" => "nhân khẩu học",
            "denary" => "toán thập tiến",
            "denial" => "từ chối",
            "dense" => "dày đặc",
            "dependent" => "phụ thuộc",
            "deploy" => "triển khai",
            "depository" => "nơi chứa",
            "deprecate" => "lỗi thời",
            "dereference" => "bỏ tham chiếu",
            "design" => "thiết kế",
            "desktop" => "máy tính để bàn",
            "developer" => "nhà phát triển",
            "device" => "thiết bị",
            "dial" => "quay số",
            "dialog" => "hộp thoại",
            "dictionary" => "từ điển",
            "die" => "chết",
            "diff" => "khác",
            "difference" => "khác biệt",
            "digit" => "chữ số",
            "digital" => "kỹ thuật số",
            "digitization" => "số hóa",
            "diode" => "đi ốt",
            "direct" => "trực tiếp",
            "directory" => "danh mục",
            "disaster" => "thảm họa",
            "discrete" => "rời rạc",
            "display" => "hiển thị",
            "dissembler" => "trình dịch ngược",
            "distance" => "khoảng cách",
            "distribute" => "phân tán",
            "dither" => "hỗn loạn",
            "dock" => "bến đậu",
            "document" => "tài liệu",
            "domain" => "miền",
            "dot" => "dấu chấm",
            "double" => "gấp đôi, số thực",
            "down" => "bị tắt",
            "download" => "tải về",
            "downsize" => "giảm kích cỡ",
            "downtime" => "thời gian chết",
            "drag" => "kéo",
            "driver" => "ổ cứng, phần mềm trung gian",
            "drop" => "thả",
            "dual" => "hai, đôi",
            "dump" => "sao lưu",
            "duty" => "nhiệm vụ",
            "dynamic" => "năng động",
            "ebook" => "sách điện tử",
            "edit" => "chỉnh sửa",
            "editor" => "trình biên tập",
            "edutainment" => "học và giải trí",
            "electronic" => "điện tử",
            "elegant" => "thanh lịch, tao nhã",
            "element" => "thành phần",
            "ellipsis" => "dấu chấm lửng",
            "else" => "khác",
            "email" => "thư điện tử",
            "embed" => "nhúng",
            "emoji" => "biểu tượng cảm xúc",
            "emoticon" => "biểu tượng cảm xúc",
            "encapsulation" => "đóng gói",
            "encode" => "mã hóa",
            "encryption" => "mã hóa",
            "end" => "kết thúc",
            "endian" => "kiểu endian",
            "endless" => "vô hạn",
            "enhancement" => "tăng cường",
            "enter" => "đi vào",
            "enterprise" => "doanh nghiệp",
            "entity" => "thực thể",
            "environment" => "môi trường",
            "epoch" => "kỷ nguyên",
            "erase" => "xoá",
            "error" => "lỗi",
            "escape" => "thoát khỏi",
            "ethernet" => "mạng ethernet",
            "event" => "sự kiện",
            "exception" => "ngoại lệ",
            "execute" => "thực thi",
            "exists" => "tồn tại",
            "expand" => "mở rộng",
            "exponent" => "số mũ",
            "export" => "trích xuất",
            "expression" => "mô tả lệnh",
            "extend" => "mở rộng, kế thừa",
            "external" => "bên ngoài",
            "extranet" => "mạng extranet",
            "eye" => "mắt",
            "fabric" => "chế tạo",
            "factorial" => "yếu tố",
            "failover" => "chuyển đổi dự phòng",
            "false" => "sai",
            "fast" => "nhanh",
            "fault" => "lỗi",
            "favicon" => "biểu tượng trang web",
            "favorite" => "yêu thích",
            "feature" => "tính năng",
            "fiber" => "sợi quang",
            "field" => "trường, lĩnh vực",
            "file" => "tập tin",
            "filename" => "tên tập tin",
            "finder" => "phần mềm tìm kiếm",
            "finite" => "có hạn",
            "firewall" => "bức tường lửa",
            "firmware" => "phần mềm firmware",
            "flag" => "cờ, đánh dấu",
            "flat" => "bằng phẳng",
            "flexible" => "linh hoạt",
            "flexography" => "uốn cong",
            "float" => "kiểu dữ liệu động",
            "floppy" => "đĩa mềm",
            "fluid" => "chất lỏng, linh động",
            "folder" => "thư mục",
            "font" => "phông chữ",
            "foo" => "giả dụ",
            "footer" => "chân trang",
            "footprint" => "dấu chân",
            "for" => "vòng lặp for",
            "foreground" => "đang chạy, tiền cảnh",
            "form" => "form nhập liệu",
            "format" => "định dạng",
            "formula" => "công thức",
            "fourier" => "chuỗi fourier",
            "fragment" => "phân mảnh",
            "frame" => "khung",
            "framework" => "bộ khung",
            "free" => "miễn phí",
            "freeware" => "phần mềm miễn phí",
            "frequency" => "tần số",
            "front" => "phía trước",
            "frozen" => "đóng băng",
            "function" => "chức năng, hàm",
            "fuzzy" => "logic mờ",
            "game" => "trò chơi",
            "garbage" => "rác",
            "gateway" => "cửa ngõ",
            "gaussian" => "xác suất gaussian",
            "geek" => "chuyên viên máy tính",
            "general" => "chung",
            "generation" => "thế hệ",
            "genetic" => "di truyền",
            "ghost" => "phần mềm ghost",
            "glitch" => "trục trặc",
            "glue" => "kết dính",
            "graph" => "biểu đồ",
            "graphic" => "đồ họa",
            "gravity" => "trọng lực",
            "gravure" => "ống đồng",
            "grayscale" => "màu xám",
            "greedy" => "thuật toán tham lam",
            "gregorian" => "lịch gregorian",
            "grid" => "lưới",
            "groupware" => "phần mềm nhóm",
            "gui" => "giao diện đồ họa",
            "gyroscope" => "con quay",
            "handle" => "xử lý",
            "handshake" => "bắt tay",
            "hang" => "treo",
            "hardware" => "phần cứng",
            "hash" => "băm",
            "hashtag" => "dấu thăng, đánh dấu",
            "header" => "tiêu đề",
            "headphones" => "tai nghe",
            "heap" => "đống, bộ nhớ heap",
            "help" => "trợ giúp",
            "heterogeneous" => "không đồng nhất",
            "heuristic" => "kinh nghiệm học",
            "hexadecimal" => "thập lục phân",
            "hibernation" => "ngủ đông",
            "hiccup" => "nấc cục",
            "hierarchy" => "phân cấp",
            "high" => "cao",
            "histogram" => "biểu đồ",
            "hit" => "đánh, truy cập",
            "holographic" => "hình ba chiều",
            "home" => "nhà",
            "horizontal" => "ngang",
            "host" => "máy chủ",
            "hotfix" => "bản sửa lỗi nhỏ",
            "hover" => "rê chuột",
            "hub" => "trung tâm",
            "hybrid" => "hỗn hợp, lai tạp",
            "hyper" => "siêu",
            "hyperlink" => "siêu liên kết",
            "hypertext" => "siêu văn bản",
            "hypothesis" => "giả thuyết",
            "icon" => "biểu tượng",
            "identity" => "danh tính",
            "if" => "nếu",
            "illegal" => "bất hợp pháp",
            "image" => "hình ảnh",
            "imaginary" => "tưởng tượng",
            "immutable" => "bất biến",
            "impact" => "ảnh hưởng",
            "imperative" => "bắt buộc",
            "implementation" => "thực hiện",
            "implicit" => "ngầm định",
            "import" => "nhập vào",
            "impression" => "ấn tượng",
            "inbox" => "hộp thư đến",
            "incompleteness" => "không đầy đủ",
            "increment" => "tăng",
            "incubator" => "vườn ươm",
            "index" => "chỉ mục",
            "industrial" => "công nghiệp",
            "inertia" => "quán tính",
            "infinite" => "vô hạn",
            "infomercial" => "thông tin thương mại",
            "information" => "thông tin",
            "infotainment" => "giải trí",
            "inheritance" => "kế thừa",
            "inkjet" => "máy in phun",
            "inline" => "nội tuyến, nhúng",
            "input" => "đầu vào",
            "insertion" => "chèn",
            "install" => "cài đặt",
            "instance" => "ví dụ, thể hiện",
            "instantiation" => "khởi tạo",
            "instruction" => "chỉ dẫn",
            "integer" => "số nguyên",
            "integrated" => "tích hợp",
            "intellectual" => "trí tuệ",
            "intelligent" => "thông minh",
            "interactive" => "tương tác",
            "interface" => "giao diện",
            "interlace" => "xen kẽ nhau",
            "intermediate" => "trung gian",
            "internal" => "bên trong",
            "internationalization" => "quốc tế hoá",
            "interoperability" => "khả năng tương tác",
            "interpret" => "thông dịch",
            "interpreter" => "trình thông dịch",
            "interrupt" => "gián đoạn",
            "intersection" => "giao nhau",
            "invalid" => "không hợp lệ",
            "irrational" => "vô lý",
            "iterative" => "lặp lại",
            "jolt" => "chấn động",
            "joystick" => "cần điều khiển",
            "jumper" => "bộ nhảy",
            "justify" => "chế độ justify",
            "kernel" => "nhân",
            "key" => "chìa khóa",
            "keyboard" => "bàn phím",
            "keylogger" => "lưu vết phím gõ",
            "keystroke" => "bấm phím",
            "keyword" => "từ khóa",
            "kinetic" => "động học",
            "kit" => "bộ dụng cụ",
            "knowledge" => "hiểu biết",
            "label" => "nhãn",
            "lag" => "giật, chậm",
            "lambda" => "biểu thức lambda",
            "lan" => "mạng lan",
            "landscape" => "xoay ngang",
            "language" => "ngôn ngữ",
            "laptop" => "máy tính xách tay",
            "latency" => "độ trễ",
            "latitude" => "vĩ độ",
            "layer" => "lớp",
            "leaf" => "nốt lá",
            "learn" => "học hỏi",
            "led" => "bán dẫn",
            "legacy" => "di sản, kế thừa",
            "level" => "cấp độ",
            "leverage" => "đòn bẩy",
            "lexical" => "thuộc về từ vựng",
            "library" => "thư viện",
            "lightweight" => "nhẹ",
            "limit" => "giới hạn",
            "line" => "hàng, dòng",
            "linearity" => "tuyến tính",
            "link" => "liên kết",
            "literal" => "chữ",
            "live" => "trực tiếp",
            "load" => "tải trọng, tải lên",
            "local" => "địa phương",
            "lock" => "khóa",
            "log" => "đăng nhập",
            "logical" => "hợp lý",
            "login" => "đăng nhập",
            "logoff" => "đăng xuất",
            "logon" => "đăng nhập",
            "longitudinal" => "theo chiều dọc",
            "lookup" => "tra cứu",
            "loop" => "vòng lặp",
            "loophole" => "lỗ hổng",
            "loosely" => "lỏng lẻo",
            "lossless" => "không mất",
            "lossy" => "mất mát",
            "machine" => "máy móc",
            "macro" => "vĩ mô",
            "magnetic" => "từ tính",
            "mail" => "thư",
            "main" => "chính, chủ yếu",
            "mainframe" => "máy tính lớn",
            "malware" => "phần mềm độc hại",
            "map" => "bản đồ",
            "margin" => "lề",
            "markup" => "đánh dấu",
            "master" => "chủ",
            "math" => "toán học",
            "matrix" => "ma trận",
            "maximize" => "tối đa hóa",
            "media" => "phương tiện truyền thông",
            "medium" => "trung bình",
            "memo" => "bản ghi nhớ",
            "memory" => "bộ nhớ",
            "menu" => "thực đơn",
            "message" => "thông điệp",
            "metadata" => "siêu dữ liệu",
            "meter" => "mét",
            "method" => "hàm, hành vi",
            "methodology" => "phương pháp luận",
            "metric" => "số liệu",
            "micro" => "vi",
            "microcomputer" => "máy vi tính",
            "microphone" => "míc",
            "microprocessor" => "bộ vi xử lý",
            "microsecond" => "micro giây",
            "microwave" => "vi sóng",
            "middleware" => "phần mềm trung gian",
            "millennium" => "thiên niên kỷ",
            "millisecond" => "mili giây",
            "minicomputer" => "máy tính nhỏ",
            "minimize" => "giảm thiểu",
            "mobile" => "di động",
            "modifier" => "sửa đổi",
            "module" => "mô-đun",
            "molecule" => "phân tử",
            "monitor" => "màn hình, giám sát",
            "monolithic" => "nguyên khối",
            "motherboard" => "bo mạch chủ",
            "motion" => "chuyển động",
            "mount" => "gắn kết",
            "mouse" => "chuột",
            "multicore" => "đa lõi",
            "multimedia" => "đa phương tiện",
            "multiplatform" => "đa nền tảng",
            "multiplexer" => "bộ ghép kênh",
            "multiprocessing" => "đa xử lý",
            "multitask" => "đa nhiệm",
            "multithread" => "đa luồng",
            "namespace" => "không gian tên",
            "nanocomputer" => "máy tính siêu nhỏ",
            "nanosecond" => "nano giây",
            "nanotube" => "ống nano",
            "native" => "tự nhiên",
            "navigation" => "dẫn đường",
            "nest" => "lồng nhau",
            "net" => "mạng lưới",
            "network" => "mạng",
            "neural" => "thần kinh",
            "newbie" => "người mới",
            "newline" => "dòng mới",
            "newsgroup" => "nhóm tin",
            "nickname" => "tên nick",
            "nil" => "không, null",
            "node" => "nút",
            "noise" => "nhiễu",
            "norm" => "định mức",
            "normative" => "có quy chuẩn",
            "null" => "vô giá trị",
            "number" => "con số",
            "obfuscate" => "làm xáo trộn",
            "object" => "đối tượng",
            "obliquity" => "nghiêng",
            "octet" => "bát phân",
            "offline" => "không kết nối",
            "ok" => "được",
            "online" => "trực tuyến",
            "onshore" => "trong nước",
            "ontology" => "bản thể học",
            "opacity" => "độ mờ",
            "open" => "mở",
            "operand" => "toán hạng",
            "operate" => "vận hành",
            "optical" => "quang",
            "order" => "thứ tự",
            "original" => "nguyên bản",
            "outbox" => "hộp thư đi",
            "output" => "đầu ra",
            "outsource" => "thuê ngoài",
            "overflow" => "tràn",
            "overload" => "quá tải",
            "overwrite" => "ghi đè lên",
            "package" => "gói tin",
            "page" => "trang",
            "paradigm" => "mô hình",
            "paradox" => "nghịch lý",
            "parallel" => "song song",
            "parameter" => "tham số",
            "parenthesis" => "dấu ngoặc đơn",
            "parity" => "tính chẵn lẻ",
            "parse" => "phân tích cú pháp",
            "partition" => "phân vùng",
            "passcode" => "mật khẩu",
            "passive" => "thụ động",
            "password" => "mật khẩu",
            "paste" => "dán",
            "path" => "đường dẫn",
            "payload" => "dữ liệu vận chuyển",
            "performance" => "hiệu suất",
            "peripheral" => "ngoại vi",
            "persistent" => "liên tục",
            "personal" => "cá nhân",
            "phenomenon" => "hiện tượng",
            "phishing" => "lừa đảo",
            "photometric" => "phép trắc quang",
            "phrase" => "cụm từ",
            "physical" => "vật lý",
            "pick" => "chọn",
            "pictograph" => "biểu đồ",
            "pie" => "biểu đồ hình quạt",
            "pin" => "ghim",
            "pipe" => "ống",
            "pipeline" => "ống dẫn",
            "pixel" => "điểm ảnh",
            "plain" => "thuần, rõ ràng",
            "platform" => "nền tảng",
            "plesiochronous" => "không đồng bộ",
            "plug" => "cắm",
            "pointer" => "con trỏ",
            "polar" => "cực",
            "polymorphism" => "đa hình",
            "polynomial" => "đa thức",
            "port" => "cổng",
            "portable" => "khả chuyển",
            "portal" => "cổng thông tin",
            "portrait" => "chiều dọc",
            "position" => "vị trí",
            "post" => "bài đăng",
            "power" => "sức mạnh, nguồn điện",
            "predictive" => "tiên đoán",
            "presentation" => "trình bày",
            "pretest" => "kiểm tra trước",
            "primary" => "sơ cấp",
            "print" => "in",
            "printer" => "máy in",
            "private" => "riêng tư",
            "probability" => "xác suất",
            "problem" => "vấn đề",
            "procedure" => "thủ tục",
            "process" => "tiến trình",
            "processor" => "bộ vi xử lý",
            "product" => "sản phẩm",
            "program" => "lập trình",
            "programmer" => "lập trình viên",
            "progressive" => "cấp tiến",
            "project" => "dự án",
            "prompt" => "nhắc nhở",
            "propagation" => "lan truyền",
            "proper" => "phù hợp",
            "proportionality" => "cân xứng",
            "proprietary" => "độc quyền",
            "protocol" => "giao thức",
            "prototype" => "nguyên mẫu",
            "pseudo" => "giả lập",
            "pseudocode" => "giả mã",
            "public" => "công cộng",
            "pulse" => "xung",
            "pure" => "nguyên chất",
            "push" => "đẩy",
            "quality" => "chất lượng",
            "quantum" => "lượng tử",
            "query" => "truy vấn",
            "queue" => "hàng đợi",
            "quit" => "thoát",
            "quiz" => "đố",
            "qwerty" => "bàn phím qwerty",
            "race" => "tranh đua",
            "ram" => "bộ nhớ ram",
            "random" => "ngẫu nhiên",
            "raster" => "đồ họa raster",
            "ratio" => "tỉ lệ",
            "rational" => "hợp lý",
            "raw" => "thô",
            "read" => "đọc",
            "real" => "số thực",
            "reboot" => "khởi động lại",
            "record" => "ghi lại",
            "recovery" => "phục hồi",
            "recursion" => "đệ quy",
            "recycle" => "lặp lại",
            "redundancy" => "dư",
            "refresh" => "làm tươi",
            "register" => "đăng ký",
            "regular" => "đều đặn",
            "relational" => "quan hệ",
            "reliability" => "độ tin cậy",
            "reload" => "nạp lại",
            "remark" => "nhận xét",
            "remote" => "từ xa",
            "rendering" => "vẽ lại",
            "repeat" => "lặp lại",
            "repeater" => "bộ lặp",
            "replicator" => "bộ sao chép",
            "repository" => "kho chứa",
            "request" => "yêu cầu",
            "reserved" => "dành riêng",
            "resolution" => "độ phân giải",
            "resource" => "tài nguyên",
            "response" => "phản ứng, kết quả",
            "responsive" => "đáp ứng",
            "restore" => "phục hồi",
            "retime" => "hoãn lại",
            "return" => "trả về",
            "reuse" => "tái sử dụng",
            "reverse" => "đảo ngược",
            "revision" => "sửa lại",
            "ripping" => "bóc tách",
            "rogue" => "giả mạo",
            "root" => "gốc",
            "rotoscope" => "phép quay",
            "route" => "định tuyến",
            "routine" => "công việc hàng ngày",
            "row" => "hàng",
            "run" => "chạy",
            "runtime" => "thời gian chạy",
            "safe" => "an toàn",
            "sample" => "mẫu",
            "sandbox" => "hộp cát",
            "scala" => "vô hướng",
            "scalable" => "có thể mở rộng",
            "scanner" => "máy quét",
            "schedule" => "kế hoạch",
            "schema" => "giản đồ",
            "scientific" => "khoa học",
            "scratch" => "chưa có gì",
            "screen" => "màn hình",
            "screenshot" => "ảnh chụp màn hình",
            "script" => "kịch bản",
            "scroll" => "cuộn",
            "search" => "tìm kiếm",
            "secondary" => "thứ yếu",
            "section" => "phần",
            "sector" => "khu vực",
            "security" => "bảo mật",
            "seed" => "hạt giống",
            "segment" => "phần",
            "sensor" => "cảm biến",
            "separator" => "dấu phân tách",
            "sequential" => "tuần tự",
            "serial" => "nối tiếp",
            "server" => "máy chủ",
            "service" => "dịch vụ",
            "session" => "phiên",
            "set" => "bộ, tập hợp",
            "shareware" => "phần mềm chia sẻ",
            "shift" => "thay đổi",
            "sidebar" => "thanh bên",
            "sign" => "ký tên",
            "significant" => "có ý nghĩa",
            "silent" => "im lặng",
            "sim" => "thẻ sim",
            "simple" => "đơn giản",
            "simulation" => "mô phỏng",
            "single" => "độc thân",
            "site" => "địa điểm, trang web",
            "skin" => "da, giao diện",
            "sleep" => "ngủ",
            "slice" => "cắt lát",
            "slow" => "chậm",
            "smart" => "thông minh",
            "smiley" => "cười",
            "snap" => "chụp nhanh",
            "snapshot" => "ảnh chụp nhanh",
            "snippet" => "đoạn trích",
            "social" => "xã hội",
            "socket" => "ổ cắm, kênh kết nối",
            "software" => "phần mềm",
            "sort" => "sắp xếp",
            "sound" => "âm thanh",
            "source" => "nguồn",
            "space" => "không gian",
            "spaghetti" => "mì ống",
            "spam" => "rác",
            "speaker" => "loa",
            "special" => "đặc biệt",
            "spectrum" => "quang phổ",
            "speech" => "bài nói",
            "speed" => "tốc độ",
            "spell" => "đánh vần",
            "spin" => "quay",
            "spoofing" => "giả mạo",
            "spool" => "con lăn",
            "spreadsheet" => "bảng tính",
            "sprite" => "ảnh sprite",
            "spyware" => "phần mềm gián điệp",
            "square" => "bình phương",
            "stack" => "ngăn xếp",
            "standalone" => "độc lập",
            "standard" => "tiêu chuẩn",
            "standby" => "đứng im",
            "start" => "khởi đầu",
            "state" => "trạng thái",
            "statement" => "câu lệnh",
            "static" => "tĩnh",
            "statistical" => "thống kê",
            "status" => "trạng thái",
            "stickiness" => "dính liền",
            "storage" => "lưu trữ",
            "strategy" => "chiến lược",
            "stream" => "dòng",
            "streaming" => "phát trực tuyến",
            "string" => "chuỗi",
            "strong" => "mạnh",
            "struct" => "cấu trúc",
            "subdirectory" => "thư mục con",
            "subnet" => "mạng con",
            "subset" => "tập hợp con",
            "substring" => "chuỗi con",
            "subversion" => "phiên bản con",
            "suffix" => "hậu tố",
            "sum" => "cộng, tổng hợp",
            "superclass" => "lớp cha",
            "supercomputer" => "siêu máy tính",
            "support" => "hỗ trợ",
            "surd" => "tăng",
            "surf" => "lướt",
            "surface" => "bề mặt",
            "surfing" => "lướt web",
            "swap" => "trao đổi",
            "swipe" => "vuốt",
            "switch" => "chuyển đổi",
            "symbolic" => "tượng trưng",
            "symbology" => "biểu tượng",
            "symmetric" => "đối xứng",
            "sync" => "đồng bộ hóa",
            "synchronous" => "đồng bộ",
            "syntax" => "cú pháp",
            "system" => "hệ thống",
            "tab" => "chuyển hướng",
            "table" => "bảng",
            "tablet" => "máy tính bảng",
            "tag" => "nhãn",
            "tail" => "đuôi",
            "tape" => "băng",
            "target" => "mục tiêu",
            "task" => "nhiệm vụ",
            "taxonomy" => "phân loại",
            "team" => "đội, nhóm",
            "technology" => "công nghệ",
            "telecommunication" => "viễn thông",
            "teleconference" => "hội nghị từ xa",
            "template" => "bản mẫu",
            "term" => "kỳ hạn",
            "terminal" => "thiết bị đầu cuối",
            "ternary" => "bộ chia ba",
            "text" => "văn bản",
            "theory" => "lý thuyết",
            "thick" => "dày",
            "thin" => "mỏng",
            "third" => "thứ ba",
            "thread" => "tiến trình",
            "throughput" => "thông lượng",
            "thumbnail" => "hình nhỏ",
            "time" => "thời gian",
            "title" => "tiêu đề",
            "toggle" => "bật tắt",
            "token" => "mã thông báo",
            "toolbar" => "thanh công cụ",
            "tooltip" => "chú giải công cụ",
            "topic" => "chủ đề",
            "total" => "toàn bộ, tổng",
            "touchpad" => "chuột cảm ứng",
            "touchscreen" => "màn hình cảm ứng",
            "trackback" => "theo dõi lại",
            "transcendental" => "siêu việt",
            "transcription" => "phiên mã",
            "transfer" => "chuyển",
            "transistor" => "bóng bán dẫn",
            "transition" => "quá trình chuyển đổi",
            "transparent" => "trong suốt",
            "transport" => "vận chuyển",
            "trash" => "rác",
            "tree" => "cây",
            "trim" => "cắt tỉa",
            "troll" => "chơi khăm",
            "troubleshoot" => "khắc phục sự cố",
            "true" => "đúng",
            "truncate" => "cắt bớt",
            "tunnel" => "đường hầm",
            "turnkey" => "chìa khoá trao tay",
            "tutorial" => "hướng dẫn",
            "tweak" => "tinh chỉnh",
            "typeface" => "kiểu chữ",
            "ultra" => "cực kỳ",
            "unary" => "thống nhất",
            "uncertainty" => "không chắc chắn",
            "uncompress" => "giải nén",
            "undefined" => "chưa xác định",
            "underflow" => "tràn vào",
            "undo" => "hoàn tác",
            "unfriend" => "hủy kết bạn",
            "union" => "hợp",
            "unique" => "độc nhất",
            "unit" => "đơn vị",
            "universal" => "phổ cập",
            "unmount" => "tháo dỡ",
            "unzip" => "giải nén",
            "upgrade" => "nâng cấp",
            "upload" => "tải lên",
            "uptime" => "thời gian hoạt động",
            "usability" => "khả năng sử dụng",
            "user" => "người dùng",
            "username" => "tên truy cập",
            "utility" => "tiện ích",
            "value" => "giá trị",
            "variable" => "biến",
            "vendor" => "nhà cung cấp",
            "version" => "phiên bản",
            "vertical" => "theo chiều dọc",
            "viral" => "lan truyền",
            "virtual" => "ảo",
            "vision" => "tầm nhìn",
            "visual" => "trực quan",
            "voice" => "tiếng nói",
            "void" => "vô hiệu",
            "volume" => "âm lượng",
            "wall" => "tường",
            "wave" => "sóng",
            "waveform" => "dạng sóng",
            "wavelength" => "bước sóng",
            "website" => "trang mạng",
            "while" => "trong khi",
            "window" => "cửa sổ",
            "wipe" => "vuốt, xóa",
            "wired" => "có dây",
            "wireless" => "không dây",
            "wizard" => "thuật sĩ",
            "word" => "từ",
            "work" => "công việc",
            "workaround" => "cách giải quyết",
            "workload" => "khối lượng công việc",
            "workspace" => "không gian làm việc",
            "workstation" => "máy trạm",
            "worm" => "sâu",
            "write" => "viết",
            "zero" => "không",
            "zone" => "vùng"
        ];
        foreach($words as $key => $value){
            $vocabulary = new vocabularies;
            $vocabulary->name = $key;
            $vocabulary->meaning = $value;
            $vocabulary->save();
        }

    }
}