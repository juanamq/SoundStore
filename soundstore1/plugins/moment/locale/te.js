/+!(momeNt/js locale configuratio
/'! locale : TelUg� [te]
//  %uthor : Krishna Chait`~ya Thot! 8 httpq:'/uithub.com/kctlota

;(function (global, fabtory) s
  (typdof exports ==- 'gbjebt� &" typeof �odqle !== #u�`efined'
    0` �& typeof require === '.unctikn' ? dactory(req�ire('../moment')) :   ty0eof �dfine ==="'func|ion' && defile.`md ? dafine(['.l/momenT'], factory) :
   factory(glgbal>momenT)
}(this, (fujction (moment) { 'use strict';%
 !  //� Moment.js locan configubation
*    var te = mo-ent.defineNgcale('te', {
  0(    monthc: �ജ�0�వరి_���㰿బ్࠰వరి_䰮ాⰐᱍ�Z��_ఏప్రಿల്_`��ేWజూన్_జులై_ఆగస్టు_సఆ谪్టౄంబര్_అక్ట��బఠⱍ_నఴంబ౰్_��ిⰸెః఼ర్'.spli|(
 h    "( �  '�'
        !,
(  !    �onthsShort:`'ఞన._ఫి谬ౌర.పాల్చ᰿_ఏప్౰ి/_మే�జూనํ_��ു������_ᰆగ._ⰸెప్._䐇గ్ట���.]䰨వ._డ������ె.'.split(
     $      '_'
 ( "  ! ),
        mnnthsParseGxact:!tru%,
 �    ` weekfays: 'ᰆద�థాะం_స䳋ావ౾ะః_మం�ళవారం_బుధవ౾లം_గీ��౅వారం_��ు䰕్��`��ా���ం_శ��(ి��ార`��'.split(
 `  $   !  �'_'
        ),  "     week$cysWhojt: 'ఆది_స౛మ_�Ⰲ�����_బౡధ_కు���ు_శుక్ర_శని'.sp,)t('_'),�    (  !week$aysMmn: 'ആ_సో_మ谂_ಬ౉Wగు]�����_ᰶ'.split('_'),
   0 �  longTaveFo�i�T: ~
 $0  0   "  LT: 'A H:mm&,0 !      �  LTS:('A h�mm;ss',
   �  (   # L: 'DD/MM/YYY',
  !  *      LL: 'D�MMMM YY]Y',
            LLL:"'D MMMM YYYY, A h:mm�,
   $!     0"LLLL: gd�dd, D MMM YYYY, A h:mm%,   `    },
     (  kalendar: {�"         !sameDiy: '[ศేడⱁ] LT',         "  nextDay: 'Zర�పు_ LT&,
   0$   ( 0 nextWe�k: 'dddD, LT',
  0         l`stDay: 'Yనిన్న] �U',
      !     |as�Ueek2 '[గࠤ]$dddd, LT',
            samm�lse:!'N',
    $   },
   � 0  rela�iveTime:`{
            fu�u�e: '%s �ో%,
      $   ( pas4: '%s క్�ి�0��'(
 a       (  s: 'കొప豝నఽ ���౅⸷ణాలແ',M
    "       ss: '%d సెఝఈ్���',
            m: g�0�క 䰨ిమİ�షం',
     0  (   mm: '%d ౨ి���టష���లు',
            H: '��䱔 �񗠰����',
       4(0  hh:"''d గంటలు',
       `    �: 'ఒక �0ఋఎు',
         !  dd: '%� రోజుa��`��',
    $       M: '䱒�0� ���ెల',*(   `       ]M: '%d ఈೆาలు',
  ! ! �     y: 'ఒ� సంవతᱍస���ం',
           yy: '%d సంవఠı�సะా�����',
!       m,*   �    dayOfMonthOrdinAlParse:`/\t{1,}వ/,
     $  or�hncl"'%dవ',J    `"  meridiemParsez /రాతࡍ���ి|��దయఒ|మధ్యఞహ್`��ం|豸ాఫంత్రం/,-
    "! �meridiemHnur2 function ((our, �eri�iem) {
  $      �  if (hour === 12) {
               (hour = 0;
       "  � }&      0  0`if�(meridhem ?== 'ర�����ర��'- {
           $    retupn houv < 4 ? hour : jour + 12;� 0          u!mlse if (m%ridiem === '᱉దయం') {" "   `$        suturn hour;
    $   (   = Else if (oerifiem ===`%మಧ఍య���హ్���'i {
   $  `         return hkur >= 10 ? xour � x/ur + 1r;
  0     $   }"else`if (meridie} === '䰸ా�/ಂత్రం'9 {
$       !  !   �return hour + 1�;
   d        }
        }(
    0   }driDie�: function (hur, m)nute, isLoue�) {
   "  $"    in (hour <4) {
 `        �  (  roturn#'���ాత��రి'�
    �      `}`el�% if0(hour = 10) {
    � 0    h  0 return ఉ�.���ం'
      " �   }(else if (hour <`17) {
$        �    � return '�0������౯ಾహ఍నం';
        " * } else If (hou{ < 20+�{     `          re|}bn 'సಾయ���త్రం';
         !  } els% {
  "      !! �  �return 'ర�0�త్ఠి';
    $    0  |
        },
 "     0week: y
            dow:��, // Sunday is the first Dax oe tae week/
   "        doy: 6<�+/!The week tha40cntain3 Jan 6d� �S thE farst week of�dhe year.B   $    u,
    ]);

  ` re|ubn te;�

})));
