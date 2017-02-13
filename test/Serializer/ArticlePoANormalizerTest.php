<?php

namespace test\eLife\ApiSdk\Serializer;

use eLife\ApiClient\ApiClient\ArticlesClient;
use eLife\ApiSdk\ApiSdk;
use eLife\ApiSdk\Collection\ArraySequence;
use eLife\ApiSdk\Model\Article;
use eLife\ApiSdk\Model\ArticlePoA;
use eLife\ApiSdk\Model\Block\Paragraph;
use eLife\ApiSdk\Model\Copyright;
use eLife\ApiSdk\Model\Model;
use eLife\ApiSdk\Model\Subject;
use eLife\ApiSdk\Serializer\ArticlePoANormalizer;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use test\eLife\ApiSdk\ApiTestCase;
use test\eLife\ApiSdk\Builder;

/**
 * @group failing
 */
final class ArticlePoANormalizerTest extends ApiTestCase
{
    /** @var ArticlePoANormalizer */
    private $normalizer;

    /**
     * @before
     */
    protected function setUpNormalizer()
    {
        $apiSdk = new ApiSdk($this->getHttpClient());
        $this->normalizer = new ArticlePoANormalizer(new ArticlesClient($this->getHttpClient()));
        $this->normalizer->setNormalizer($apiSdk->getSerializer());
        $this->normalizer->setDenormalizer($apiSdk->getSerializer());
    }

    /**
     * @test
     */
    public function it_can_reverse()
    {
        $failing = $this->getFailing();
        $apiSdk = new ApiSdk($this->getHttpClient());
        $apiSdk->getSerializer()->denormalize(json_encode($failing), Model::class, 'json');
    }

    public function getFailing() {
        return array (
            'body' =>
                array (
                    0 =>
                        array (
                            'title' => 'Introduction',
                            'content' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'paragraph',
                                            'text' => 'Enhancing the diversity of the research workforce has been a longstanding priority of scientific funding agencies (<a href="#bib55">Tabak and Collins, 2011</a>; <a href="#bib58">Valantine and Collins, 2015</a>; <a href="#bib39">National Institutes of Health, 2015</a>; <a href="#bib36">National Institute of General Medical Sciences, 2015</a>). Scientists from certain underrepresented minority (URM) racial/ethnic backgrounds—specifically, African American/Black, Hispanic/Latin@, American Indian, and Alaska Native—receive 6% of NIH research project grants (<a href="#bib19">Ginther et al., 2016</a>, <a href="#bib20">2011</a>; <a href="#bib38">National Institutes of Health, 2012b</a>) despite having higher representation in the relevant labor market (<a href="#bib23">Heggeness et al., 2016</a>), and constituting 32% of the US population (<a href="#bib38">National Institutes of Health, 2012b</a>). The vast majority of NIH funding—approximately 83%—is awarded to investigators at extramural institutions, many of whom serve as faculty members at academic and research institutions (<a href="#bib26">Johnson, 2013</a>). In particular, MD-granting medical schools and their affiliates (henceforth, medical schools) that belong to the Association of American Medical Colleges (AAMC) receive 67% of NIH extramural funding, and comprised the entire top 20 of NIH-funded institutions in FY2015 (<a href="#bib40">National Institutes of Health, 2016</a>). As a result, the goal of diversifying the biomedical investigator pool necessitates diversifying the professoriate generally, and in medical schools specifically.',
                                        ),
                                    1 =>
                                        array (
                                            'type' => 'paragraph',
                                            'text' => 'Faculty members play critical and unique roles within the scientific enterprise, shaping the national research agenda, and cultivating the next generation of scientists and scholars (<a href="#bib4">Clauset et al., 2015</a>; <a href="#bib29">Leggon, 2010</a>). However, a 2011 report from the National Academies of Sciences said “diversifying faculties is perhaps the least successful of the diversity initiatives” (<a href="#bib35">National Academy of Sciences, 2011</a>). Student protests on college campuses across the country in the 2015 academic year often centered on the need for more faculty diversity, and highlighted the lack thereof, especially in scientific disciplines (<a href="#bib22">Griffin, 2016</a>). As the nation continues to diversify, broadening participation within the research enterprise and professoriate is believed to be critically important for maintaining an adequate domestic scientific workforce, and ensuring the research enterprise effectively meets the needs of the entire population (<a href="#bib38">National Institutes of Health, 2012b</a>; <a href="#bib35">National Academy of Sciences, 2011</a>).',
                                        ),
                                    2 =>
                                        array (
                                            'type' => 'paragraph',
                                            'text' => 'This work focuses on three possible reasons for the low number of scientists from URM backgrounds in the professoriate relative to their peers from well-represented (WR) backgrounds (specifically, White, Asian, and all other non-URM groups) that are amenable to intervention by the scientific community: (i) the size of the URM PhD talent pool, (ii) the number of available faculty positions, and (iii) the transition of the available URM PhD and postdoctoral talent pool onto the faculty job market, and their subsequent hiring. Educational disparities between students from URM and WR backgrounds begin early in life, and accumulate from K-12 through early independence (<a href="#bib38">National Institutes of Health, 2012b</a>; <a href="#bib10">Garrison, 2013</a>). Thus, it is possible that the cumulative impact of these disparities is the URM PhD and postdoctoral talent pool that is too small to sustain meaningful levels of faculty diversity (<a href="#bib21">Garrison et al., 2009</a>). If so, intervention strategies would need to focus primarily on building the talent pool.',
                                        ),
                                    3 =>
                                        array (
                                            'type' => 'paragraph',
                                            'text' => 'Additionally, current faculty diversity efforts occur against the backdrop of systemic changes within biomedicine. Following the doubling of the NIH budget between 1998 and 2003, there was a significant increase in the number of PhDs awarded, without commensurate increase in the number of faculty positions (<a href="#bib54">Stephan, 2012</a>; <a href="#bib1">Alberts et al., 2014</a>). This led to labor market imbalances in which there are significantly more scientists who desire faculty positions than the supply of such positions. Further, it is estimated that fewer than 11% of all life science PhDs enter faculty positions in any institution type (<a href="#bib42">National Science Board, 2014</a>). This raises the possibility that the low number of faculty from URM groups is mainly a function of broader stresses on the faculty job market or changes in the overall labor market for PhDs (<a href="#bib61">Zolas et al., 2015</a>). If so, intervention strategies could focus on expanding the number of new faculty positions available, thus creating more opportunities for scientists from all backgrounds.',
                                        ),
                                    4 =>
                                        array (
                                            'type' => 'paragraph',
                                            'text' => 'Beyond the number of faculty positions available, there is evidence that graduate students and postdocs from all backgrounds lose interest in faculty careers in research-intensive universities as their training progresses (<a href="#bib9">Fuhrmann et al., 2011</a>; <a href="#bib17">Gibbs et al., 2015</a>; <a href="#bib49">Sauermann and Roach, 2012</a>). Moreover, at PhD completion URM men and women report lower levels of interest in faculty positions at research-intensive universities than their WR counterparts, even when controlling for career interests at PhD entry, scholarly productivity, mentorship or research self-efficacy (<a href="#bib16">Gibbs et al., 2014</a>). Thus, part of the lack of representation could be due to disproportionately low application rates by URM PhD graduates and postdocs for these positions for reasons ranging from values misalignment (<a href="#bib15">Gibbs et al., 2013</a>), implicit and explicit biases (<a href="#bib5">Colon Ramos and Quiñones-Hinojosa, 2016</a>; <a href="#bib25">Jarvis, 2015</a>), or perceptions of hypercompetition within academic research that makes the positions particularly unattractive in the current funding climate (<a href="#bib30">McDowell et al., 2014</a>).',
                                        ),
                                    5 =>
                                        array (
                                            'type' => 'paragraph',
                                            'text' => 'Increasing diversity in the applicant pool and equitable evaluation in the hiring process are strategies that promote faculty diversity (<a href="#bib57">Turner, 2002</a>; <a href="#bib50">Sheridan et al., 2010</a>; <a href="#bib32">Moody, 2004</a>; <a href="#bib51">Smith, 2015</a>). While systematic data are not available on the demographics of faculty applicants, the chair of a recent faculty search in systems biology at Harvard university reported very low numbers of applications from women and scientists from URM backgrounds (<a href="#bib7">Eddy, 2015</a>), lending credence to the notion that faculty applicant pools lack diversity. If this is the case, intervention strategies could focus on enhancing diversity in the applicant pool and ensuring equitable evaluation to increase faculty diversity.',
                                        ),
                                    6 =>
                                        array (
                                            'type' => 'paragraph',
                                            'text' => 'The static nature of faculty diversity, especially in research-intensive environments, suggests that new approaches are necessary for achieving the goal of workforce diversity. In particular, computational modeling approaches such as System Dynamics (SD) have been used to examine the macro-scale impacts of potential policy interventions on the biomedical postdoctoral workforce (<a href="#bib13">Ghaffarzadegan et al., 2014</a>), and new faculty hiring (<a href="#bib27">Larson and Diaz, 2012</a>). The goal of this work is to:',
                                        ),
                                    7 =>
                                        array (
                                            'prefix' => 'number',
                                            'type' => 'list',
                                            'items' =>
                                                array (
                                                    0 =>
                                                        array (
                                                            0 =>
                                                                array (
                                                                    'type' => 'paragraph',
                                                                    'text' => 'Provide a systematic and quantitative perspective on changes in the numbers of biomedical PhDs and assistant professorships in medical school basic science departments by scientists from URM and WR backgrounds between 1980-2014.',
                                                                ),
                                                        ),
                                                    1 =>
                                                        array (
                                                            0 =>
                                                                array (
                                                                    'type' => 'paragraph',
                                                                    'text' => 'Build and validate a System Dynamics (SD) model that can capture major trends in the career progression of PhD scientists from URM and WR backgrounds into this segment of the professoriate.',
                                                                ),
                                                        ),
                                                    2 =>
                                                        array (
                                                            0 =>
                                                                array (
                                                                    'type' => 'paragraph',
                                                                    'text' => 'Utilize the SD model to test the impact of various intervention strategies to faculty diversity in the short-term (through 2030) and long-term (through 2080). Specifically, we model the impact on faculty diversity at the assistant professor stage by increasing: (i) the size of the talent pool of PhDs from URM backgrounds, (ii) the number of assistant professor positions available, or (iii) the rate of transition of PhDs from URM backgrounds into the applicant pool of assistant professorships.',
                                                                ),
                                                        ),
                                                ),
                                        ),
                                    8 =>
                                        array (
                                            'type' => 'paragraph',
                                            'text' => 'We focus on medical school basic science departments because of the availability of comprehensive, longitudinal demographic data (in contrast to the broader biomedical workforce, where career outcome data are lacking [<a href="#bib46">Polka et al., 2015</a>; <a href="#bib37">National Institutes of Health, 2012a</a>]). Our goal is that these analyses can provide an example for other areas of the scientific community working to address their own diversity challenges.',
                                        ),
                                ),
                            'type' => 'section',
                            'id' => 's1',
                        ),
                    1 =>
                        array (
                            'title' => 'Results',
                            'content' =>
                                array (
                                    0 =>
                                        array (
                                            'title' => 'Trends in PhD Graduation and assistant professorship growth: 1980-2014',
                                            'content' =>
                                                array (
                                                    0 =>
                                                        array (
                                                            'type' => 'paragraph',
                                                            'text' => '<a href="#fig1">Figure 1</a> shows how the representation of scientists from URM and WR backgrounds in the populations of biomedical PhD graduates, and assistant professors in medical school basic science departments has changed from 1980-2014 (complete data are available in <a href="#SD1-data">Figure 1—source data 1</a>). These analyses include the annual population (<a href="#fig1">Figure 1Ai,Bi</a>), population growth relative to 1980 (<a href="#fig1">Figure Aii,Bii</a>), and the percentages of scientists from each population from each group (<a href="#fig1">Figure 1Aiii,Biii</a>). Data on the populations of PhD graduates and assistant professors in medical school basic science departments were obtained from the National Science Foundation Survey of Earned Doctorates (as compiled by Federation of American Societies for Experimental Biology), and the AAMC Faculty Roster, respectively (please see methods section for more information).',
                                                        ),
                                                    1 =>
                                                        array (
                                                            'filename' => 'elife-21393-fig1-v2.jpg',
                                                            'type' => 'image',
                                                            'label' => 'Figure 1.',
                                                            'doi' => '10.7554/eLife.21393.002',
                                                            'sourceData' =>
                                                                array (
                                                                    0 =>
                                                                        array (
                                                                            'filename' => 'elife-21393-fig1-data1-v2.xlsx',
                                                                            'label' => 'Figure 1—source data 1.',
                                                                            'doi' => '10.7554/eLife.21393.003',
                                                                            'mediaType' => 'application/xlsx',
                                                                            'title' => 'PhD graduates and assistant professors (Total, URM and WR): 1980-2014.',
                                                                            'uri' => 'https://publishing-cdn.elifesciences.org/21393/elife-21393-fig1-data1-v2.xlsx',
                                                                            'id' => 'SD1-data',
                                                                        ),
                                                                ),
                                                            'caption' =>
                                                                array (
                                                                    0 =>
                                                                        array (
                                                                            'type' => 'paragraph',
                                                                            'text' => 'Line charts showing the (i) annual population, (ii) population growth relative to 1980, and (iii) percentage representation of PhD graduates and assistant professors in basic science departments in medical schools for scientists from (<b>A</b>) URM and (<b>B</b>) WR racial-ethnic backgrounds. Data on the populations of PhD graduates and assistant professors in medical school basic science departments were obtained from the National Science Foundation Survey of Earned Doctorates (as compiled by Federation of American Societies for Experimental Biology), and the AAMC Faculty Roster, respectively (please see methods section for more information). Grey lines represent PhD graduates, and black lines represent assistant professors. In panels Aiii and Biii, solid grey lines represent the percentages of URM and WR PhD graduates among all students who receive PhDs in the U.S. (U.S. citizen, permanent resident, and international), and dotted lines show percentages among PhD graduates who are U.S. citizens and permanent residents. The relative growth of PhD graduates from URM backgrounds to assistant professors is greater than the same comparison among scientists from WR backgrounds (i.e., there was a significant interaction between the URM status and position, β=1.60; p=3.6*10<sup>−7</sup>; panels Aii and Bii). Data are available in <a href="#SD1-data">Figure 1—source data 1</a>.',
                                                                        ),
                                                                ),
                                                            'title' => 'Temporal trends in the populations of biomedical Underrepresented Minority (URM) and Well-Represented (WR) PhD graduates and assistant professors, 1980-2014.',
                                                            'alt' => '',
                                                            'uri' => 'https://publishing-cdn.elifesciences.org/21393/elife-21393-fig1-v2.jpg',
                                                            'id' => 'fig1',
                                                        ),
                                                    2 =>
                                                        array (
                                                            'type' => 'paragraph',
                                                            'text' => 'For both URM and WR populations, there was significant growth in the number of PhD graduates, and significant yet slower growth in the population of assistant professors (<a href="#fig1">Figure 1</a>). However, there were differences in the magnitudes of these changes across time. The annual number of URM PhD graduates grew more than nine-fold from 1980–2013 (from n=93 to n=868), whereas the population of URM assistant professors grew 2.6-fold (from n=132 in 1980 to n=341 in 2014; <a href="#fig1">Figure 1Ai–ii</a>). In comparison, for scientists from WR backgrounds growth in assistant professors was more closely aligned with growth in PhD graduates–there was a 2.2-fold increase in the annual number of PhD graduates (from n=3989 in 1980 to n=8789 in 2013; <a href="#fig1">Figure 1Bi–ii</a>), and a 1.7-fold increase for population of assistant professors (n=3246 in 1980 to n=5562 in 2014; <a href="#fig1">Figure 1Bi–ii</a>). While the population of PhD graduates grew more quickly than that of assistant professors for all groups over time, this difference was greater in the URM population than the WR population. That is, there was a statistically significant interaction between URM status and position (β=1.60; p=3.6*10<sup>−7</sup>; PhD graduates relative to assistant professors), above the impacts URM status (β=0.0602, p=0.005), position alone (β = 0.229, p=0.28), or the increases that occurred as the system grew through time (β = 0.0895, p=2*10<sup>−16</sup>).',
                                                        ),
                                                    3 =>
                                                        array (
                                                            'type' => 'paragraph',
                                                            'text' => '<a href="#fig1">Figure 1Aiii and Biii</a> show the proportions of URM and WR PhD graduates in the overall pool (solid lines) and among U.S. citizens and permanent residents (dotted lines). Among the pool of U.S. citizens and permanent residents, the proportion of URM PhD graduates grew from 2.5% in 1980 to 13% in 2013, whereas in the overall pool the proportion of URM PhD graduates grew from 2.3% in 1980 to 9% in 2013. In contrast, the percentage of URM assistant professors grew from 3.9% in 1980 to 5.8% in 2014 (<a href="#fig1">Figure 1Aiii</a>).',
                                                        ),
                                                    4 =>
                                                        array (
                                                            'type' => 'paragraph',
                                                            'text' => 'Between 2005-2013, a total of 5,842 biomedical PhDs were awarded to scientists from URM backgrounds; however, there were six <i>fewer</i> URM assistant professors in basic science departments in 2014 than in 2005 (n=341 in 2014 versus 347 in 2005). For scientists from WR backgrounds, there was 31% growth in the annual number of PhD graduates (n=8789 in 2013 compared to n=6703 in 2005) and 8.6% growth in the population of assistant professors (n=5562 in 2014 compared to n=5122 in 2005). Thus, while the populations of PhD graduates and assistant professors has grown since 1980 for scientists from all backgrounds, the magnitude of the growth of PhD graduates relative to assistant professors differed greatly between URM and WR scientists.',
                                                        ),
                                                ),
                                            'type' => 'section',
                                            'id' => 's2-1',
                                        ),
                                    1 =>
                                        array (
                                            'title' => 'Hiring patterns of URM and WR assistant professors in basic science',
                                            'content' =>
                                                array (
                                                    0 =>
                                                        array (
                                                            'type' => 'paragraph',
                                                            'text' => 'The patterns of assistant professor hiring differed across populations. For scientists from URM backgrounds, there was a 7.6-fold increase in the size of the potential candidate pool (<a href="#fig2">Figure 2Ai</a>); however, the size of the potential URM candidate pool was not significantly correlated with the number of URM assistant professors hired each year (R<sup>2</sup>=0.12, p=0.07; <a href="#fig2">Figure 2Aii</a>). In contrast, for scientists from WR backgrounds there was a 2.2-fold growth in the size of the candidate pool (<a href="#fig2">Figure 2Bi</a>), and the size of the potential candidate pool was significantly correlated with the number of assistant professors hired (R<sup>2</sup>=0.48, p=2.54*10<sup>−5</sup>; <a href="#fig2">Figure 2Bii</a>). For scientists from URM backgrounds, the proportion of the candidate pool hired into assistant professor positions decreased from year to year (β=-0.14, p=9.6*10<sup>−4</sup>), while for scientists from WR backgrounds the proportion of the potential candidate pool hired did not change significantly over time (β=0.004, p=0.77). Thus, despite growth in the pools of potential URM and WR candidates, the nature of entry into assistant professor positions differed significantly between the two populations, with little connection between the size of the URM available candidate pool, and the numbers entering into assistant professor positions (full data are available in <a href="#SD2-data">Figure 2—source data 1</a> and <a href="#SD3-data">2</a>).',
                                                        ),
                                                    1 =>
                                                        array (
                                                            'filename' => 'elife-21393-fig2-v2.jpg',
                                                            'type' => 'image',
                                                            'label' => 'Figure 2.',
                                                            'doi' => '10.7554/eLife.21393.004',
                                                            'supplements' =>
                                                                array (
                                                                    0 =>
                                                                        array (
                                                                            'filename' => 'elife-21393-fig2-figsupp1-v2.jpg',
                                                                            'type' => 'image',
                                                                            'label' => 'Figure 2—figure supplement 1.',
                                                                            'doi' => '10.7554/eLife.21393.007',
                                                                            'caption' =>
                                                                                array (
                                                                                    0 =>
                                                                                        array (
                                                                                            'type' => 'paragraph',
                                                                                            'text' => 'Scatter plots showing the (i) pool of potential candidates for assistant professor positions, (ii) annual number of assistant professors hired, and (iii) percentage of the potential candidate pool hired annually for (<b>A</b>) URM Men, (<b>B</b>) URM Women, (<b>C</b>) WR Men, and (<b>D</b>) WR women. R<sup>2</sup> values in panels A-Dii were derived from correlating number of URM or WR assistant professors hired with the size of their respective pool of potential candidates. β in panels A-Diii reflect the yearly percentage change in the fraction of the pools of URM and WR scientists hired into assistant professor positions. Asterisks represent significant values (p&lt;10<sup>−4</sup>). Data are available in <a href="#SD2-data">Figure 2—source data 1</a> and <a href="#SD3-data">2</a>.',
                                                                                        ),
                                                                                ),
                                                                            'title' => 'Candidate pool size, hiring and utilization of URM and WR assistant professors in basic biomedical science departments: by gender.',
                                                                            'alt' => '',
                                                                            'uri' => 'https://publishing-cdn.elifesciences.org/21393/elife-21393-fig2-figsupp1-v2.jpg',
                                                                            'id' => 'fig2s1',
                                                                        ),
                                                                ),
                                                            'sourceData' =>
                                                                array (
                                                                    0 =>
                                                                        array (
                                                                            'filename' => 'elife-21393-fig2-data1-v2.xlsx',
                                                                            'label' => 'Figure 2—source data 1.',
                                                                            'doi' => '10.7554/eLife.21393.005',
                                                                            'mediaType' => 'application/xlsx',
                                                                            'title' => 'Assistant professor hiring and leaving (total, URM and WR): 1980-2014.',
                                                                            'uri' => 'https://publishing-cdn.elifesciences.org/21393/elife-21393-fig2-data1-v2.xlsx',
                                                                            'id' => 'SD2-data',
                                                                        ),
                                                                    1 =>
                                                                        array (
                                                                            'filename' => 'elife-21393-fig2-data2-v2.xlsx',
                                                                            'label' => 'Figure 2—source data 2.',
                                                                            'doi' => '10.7554/eLife.21393.006',
                                                                            'mediaType' => 'application/xlsx',
                                                                            'title' => 'Candidate pool and fraction hired (URM and WR): 1980-2014.',
                                                                            'uri' => 'https://publishing-cdn.elifesciences.org/21393/elife-21393-fig2-data2-v2.xlsx',
                                                                            'id' => 'SD3-data',
                                                                        ),
                                                                ),
                                                            'caption' =>
                                                                array (
                                                                    0 =>
                                                                        array (
                                                                            'type' => 'paragraph',
                                                                            'text' => 'Scatter plots showing the (i) pool of potential candidates for assistant professor positions, (ii) annual number of assistant professors hired, and (iii) percentage of the potential candidate pool hired annually for scientists from (<b>A</b>) URM and (<b>B</b>) WR backgrounds. R<sup>2</sup> values in panels Aii and Bii are derived from correlating number of URM or WR assistant professors hired with the size of their respective pool of potential candidates. β in panels Aiii and Biii reflect the yearly percentage change in the fraction of the pools of URM and WR scientists hired into assistant professor positions. Asterisks represent significant values (p&lt;10<sup>−4</sup>). Data are available in <a href="#SD2-data">Figure 2—source data 1</a> and <a href="#SD3-data">2</a>.',
                                                                        ),
                                                                ),
                                                            'title' => 'Candidate pool size, hiring and utilization of URM and WR assistant professors in basic biomedical science departments.',
                                                            'alt' => '',
                                                            'uri' => 'https://publishing-cdn.elifesciences.org/21393/elife-21393-fig2-v2.jpg',
                                                            'id' => 'fig2',
                                                        ),
                                                ),
                                            'type' => 'section',
                                            'id' => 's2-2',
                                        ),
                                    2 =>
                                        array (
                                            'title' => 'System dynamics model development and calibration',
                                            'content' =>
                                                array (
                                                    0 =>
                                                        array (
                                                            'type' => 'paragraph',
                                                            'text' => 'We created a System Dynamics model capturing the flows of PhD graduates from URM and WR backgrounds into assistant professor positions. This abstract model (<a href="#bib18">Gilbert, 2007</a>) expands on the traditional “pipeline” view of assistant professor hiring (<a href="#fig3">Figure 3A</a>), and is calibrated with the empirical data mentioned above (<a href="#fig3">Figure 3B</a> for intermediate conceptual model, and <a href="#fig3">Figure 3C</a> for final model; the source code provides the model software file). Hiring trends (e.g. growth in pool size, relationship between potential candidate pool and number of assistant professors hired) were largely consistent across the intersections of gender and URM or WR status (<a href="#fig2s1">Figure 2—figure supplement 1</a>). Thus, for modeling, we focused only on URM/WR status, and not their intersections with gender.',
                                                        ),
                                                    1 =>
                                                        array (
                                                            'filename' => 'elife-21393-fig3-v2.jpg',
                                                            'type' => 'image',
                                                            'label' => 'Figure 3.',
                                                            'doi' => '10.7554/eLife.21393.008',
                                                            'caption' =>
                                                                array (
                                                                    0 =>
                                                                        array (
                                                                            'type' => 'paragraph',
                                                                            'text' => '(<b>A</b>) A traditional “pipeline” view of faculty hiring. A fraction of the total stock of PhD graduates pursues faculty positions, and thus become candidates on the market. Candidates on the market are composed primarily of the subset of postdoctoral scientists pursuing faculty careers in medical school basic science departments but can include those who have non-traditional career paths such as the rare PhD student who proceeds directly to the faculty job market. Each year, candidates on the market are hired into the stock of assistant professors at a rate equal to the total number of slots available (“slots available”), and candidates who are not hired remain in the pool conditional on hiring probability (“market dropout”). After six years, assistant professors leave the system (either via promotion or contract termination, “Assistant Professor Tenure or Leave”). Boxes represent stocks (quantities), hourglasses represent flows (rates; writing italicized), variables are bolded, blue arrows represent causal connections between factors, and clouds represent system boundaries (<b>B</b>) Intermediate conceptual model. The pool of PhD graduates is separated into two groups: those who will pursue and enter faculty positions in research-intensive environments (“Faculty Aspire”), and those who will pursue other career interests (“Other Aspire”). All “Faculty Aspire” graduates enter the academic job market (“Candidates on the Market”) and remain based on hiring probability, while the “Other Aspire” scientists depart the system. As the total number of PhD graduates grows (“Baseline PhD Graduate Growth Rate”), the populations of “Faculty Aspire” and “Other Aspire” graduates are expected to grow equally (i.e. they maintain the same, fixed proportions with respect to one another). Initial populations (P<sub>0</sub>) of “Faculty Aspire” and “Other Aspire” candidates represent scaling factors that, together with the baseline growth rate, produce the number of PhD graduates in each stock. Candidates on the market are hired into the stock of assistant professors at a rate equal to the total number of slots available, and then depart the system six years later. (<b>C</b>) Elaborated model of faculty hiring for PhD scientists from WR and URM backgrounds with intervention to enhance workforce diversity. The career pathways of URM and WR scientists are conceptualized as independent, but are linked with respect to assistant professor hiring by the number of assistant professor slots available. URM and WR candidates are hired based on the number of slots available, and in proportion to their representation on the market (hence the influence of WR candidates on the URM hiring rate and vice versa). That is, the model posits no bias in hiring. In addition to baseline growth, the variable “URM Target Growth Rate” represents efforts from the scientific community to enhance workforce diversity. These additional URM scientists are initially added to the “URM other aspire” stock. The “transition rate” represents the percentage of URM other aspire scientists that enter the faculty market. As this rate increases, more URM candidates enter the academic job market. Candidates hired leave the system after six years, and the initial populations (P<sub>0</sub>) are derived from empirical data as described in methods.',
                                                                        ),
                                                                ),
                                                            'title' => 'System dynamics model of assistant professor hiring.',
                                                            'alt' => '',
                                                            'uri' => 'https://publishing-cdn.elifesciences.org/21393/elife-21393-fig3-v2.jpg',
                                                            'id' => 'fig3',
                                                        ),
                                                    2 =>
                                                        array (
                                                            'type' => 'paragraph',
                                                            'text' => 'The core assumptions of the model are that the number of assistant professors hired is based on: 1) the number of positions available, and 2) the number of candidates pursuing these positions. Candidates on the market are composed primarily of the subset of postdoctoral scientists pursuing faculty careers in medical school basic science departments (evidence suggests that the rates of transition into postdoctoral training are comparable between URM and WR PhD graduates [<a href="#bib44">National Science Foundation, 2015b</a>]). Based on market hiring conditions, one-fifth of the candidates on the market drop out of the market annually. That is, if the probability of being hired is relatively high (&gt;20%) all candidates remain on the market that year; otherwise, one-fifth of the available pool drops out of the system. Thus, the average “half-life” of a candidate on the market who is not hired is five years (similar to the period of postdoctoral training for candidates pursuing faculty positions in research-intensive environments [<a href="#bib37">National Institutes of Health, 2012a</a>]).',
                                                        ),
                                                    3 =>
                                                        array (
                                                            'type' => 'paragraph',
                                                            'text' => 'The model also posits that URM and WR candidates are hired in direct proportion to their representation on the market. That is, the model’s output assumes that that racial bias does not impact hiring. Further, the model assumes that differences in relative strength on the job market across URM status do not impact hiring, because URM PhD graduates have lower interest in faculty careers in research-intensive environments than WR PhDs graduates even if they have graduated from the same institutions and have the same levels of scholarly productivity (<a href="#bib17">Gibbs et al., 2015</a>; <a href="#bib16">Gibbs et al., 2014</a>).',
                                                        ),
                                                    4 =>
                                                        array (
                                                            'type' => 'paragraph',
                                                            'text' => 'Based on the analyses presented above, the career pathways for scientists from URM and WR backgrounds were represented separately, but were linked based on the total number of assistant professor slots available. Within each population, we assumed a fixed proportion of graduates would pursue and enter faculty positions in research-intensive environments (i.e. "faculty aspire”). The size of the “faculty aspire" pool was based on hiring trends 1980-1997, before the NIH budget doubling and subsequent expansion of the biomedical PhD pool. All other PhDs would pursue other careers (i.e. “other aspire”). Without intervention, the “faculty aspire” and “other aspire” populations grow in proportion to the total number of PhD graduates (i.e. “baseline PhD graduate growth rate”). We further assumed that efforts by the scientific community to enhance the diversity of the PhD pool (“URM target growth rate”) would increase the pool of URM “other aspire” PhDs, some of whom will then transition to the faculty market. Key variables—including baseline PhD graduate growth rate, URM target growth rate, proportions of URM or WR scientists pursuing faculty positions, and the number of positions available—were derived from national survey data, while the transition rate represented a free parameter for analysis. Full details of the model are provided in the methods section and model equations and parameter values are presented in Appendix-Tables 1 and 2.',
                                                        ),
                                                    5 =>
                                                        array (
                                                            'type' => 'paragraph',
                                                            'text' => 'We calibrated our model against empirical trends in PhD graduations (R<sup>2</sup>=0.99, p&lt;0.0001; <a href="#fig4">Figure 4Ai</a>) and chose the number of available slots to match empirical assistant professor hiring trends (R<sup>2</sup>=0.96, p&lt;0.0001; <a href="#fig4">Figure 4Aii</a>). The resulting model output captured 79% of the variance in overall assistant professor hiring (R<sup>2</sup>=0.79, p&lt;0.0001; <a href="#fig4">Figure 4Aiii</a>). When disaggregated by URM and WR status, the model captures 51% of the variance in URM hiring (<a href="#fig4">Figure 4Biii</a>; R<sup>2</sup>=0.51, p&lt;0.0001), and 78% of the variance in WR assistant professor hiring (R<sup>2</sup>=0.78, p&lt;0.0001; <a href="#fig4">Figure 4Ciii</a>). Thus, the model captures major trends in URM and WR hiring rates, over and above what is captured by just examining the size of the talent pool (<a href="#fig2">Figure 2B</a>).',
                                                        ),
                                                    6 =>
                                                        array (
                                                            'filename' => 'elife-21393-fig4-v2.jpg',
                                                            'type' => 'image',
                                                            'label' => 'Figure 4.',
                                                            'doi' => '10.7554/eLife.21393.009',
                                                            'caption' =>
                                                                array (
                                                                    0 =>
                                                                        array (
                                                                            'type' => 'paragraph',
                                                                            'text' => 'Scatter plots showing the performance of the model (open circles) compared to input data (filled circles) for the populations of (i) PhD graduates, (ii) assistant professors, and (iii) newly hired assistant professors for the (<b>A</b>) overall pool, (<b>B</b>) pool of URM scientists, and (<b>C</b>) pool of WR scientists. All R<sup>2</sup> values are significant at the p&lt;0.0001 level.',
                                                                        ),
                                                                ),
                                                            'title' => 'Model simulation: 1980-2013.',
                                                            'alt' => '',
                                                            'uri' => 'https://publishing-cdn.elifesciences.org/21393/elife-21393-fig4-v2.jpg',
                                                            'id' => 'fig4',
                                                        ),
                                                ),
                                            'type' => 'section',
                                            'id' => 's2-3',
                                        ),
                                    3 =>
                                        array (
                                            'title' => 'Intervention strategies to increasing assistant professor diversity',
                                            'content' =>
                                                array (
                                                    0 =>
                                                        array (
                                                            'type' => 'paragraph',
                                                            'text' => 'We used the model to test the impact of three different intervention strategies on the diversity of the assistant professor pool in the short-term (through 2030; <a href="#fig5">Figure 5A</a>), and long-term (through 2080, <a href="#fig5">Figure 5B</a>). These strategies were: (i) increasing the size of the talent pool of PhDs from URM backgrounds (given the current transition rate), (ii) increasing the number of assistant professor positions available (given the current transition rate), or (iii) increasing the rate of transition of PhDs from URM backgrounds into the applicant pool of assistant professorships (with subsequent hiring). Unlike a “facsimile model” that would be designed to explicitly predict precise values of outcome metrics (in this case, precise numbers of PhD graduate and assistant professor ratios), our model is an “abstract model,” meaning that simulations are intended to examine the qualitative behavior associated with hypothetical policy outcomes, assuming that the system continues to follow its historic behavior (<a href="#bib18">Gilbert, 2007</a>). Specifically, from 1980-2013, the number of URM PhD graduates grew at an exponential rate. Therefore, all model runs assumed continued exponential growth of URM PhD graduates (lower growth rates of PhD graduates did not change the qualitative behavior of our model’s output).',
                                                        ),
                                                    1 =>
                                                        array (
                                                            'filename' => 'elife-21393-fig5-v2.jpg',
                                                            'type' => 'image',
                                                            'label' => 'Figure 5.',
                                                            'doi' => '10.7554/eLife.21393.010',
                                                            'sourceData' =>
                                                                array (
                                                                    0 =>
                                                                        array (
                                                                            'filename' => 'elife-21393-fig5-data1-v2.xlsx',
                                                                            'label' => 'Figure 5—source data 1.',
                                                                            'doi' => '10.7554/eLife.21393.011',
                                                                            'mediaType' => 'application/xlsx',
                                                                            'title' => 'Model predictions: percentage URM assistant professors by transition rate: 1980-2080 (current number of assistant professor positions)',
                                                                            'uri' => 'https://publishing-cdn.elifesciences.org/21393/elife-21393-fig5-data1-v2.xlsx',
                                                                            'id' => 'SD4-data',
                                                                        ),
                                                                    1 =>
                                                                        array (
                                                                            'filename' => 'elife-21393-fig5-data2-v2.xlsx',
                                                                            'label' => 'Figure 5—source data 2.',
                                                                            'doi' => '10.7554/eLife.21393.012',
                                                                            'mediaType' => 'application/xlsx',
                                                                            'title' => 'Model predictions: percentage URM assistant professors by transition rate: 1980-2080 (100 new assistant professor positions, annually, beginning in 2015)',
                                                                            'uri' => 'https://publishing-cdn.elifesciences.org/21393/elife-21393-fig5-data2-v2.xlsx',
                                                                            'id' => 'SD5-data',
                                                                        ),
                                                                ),
                                                            'caption' =>
                                                                array (
                                                                    0 =>
                                                                        array (
                                                                            'type' => 'paragraph',
                                                                            'text' => 'Line graph showing model predictions for the percentage of URM PhD graduates (grey), and the corresponding percentages of URM assistant professors (black) as a function of various intervention strategies to increase faculty diversity in (<b>A</b>) short-term, through 2030, and (<b>B</b>) long-term, through 2080. All model runs assume an exponential increase in the number of PhDs from URM backgrounds. Thus, in all runs, the percentage of PhD scientists from URM backgrounds is 13.8% in 2030 and 73% in 2080. Simulations: (i) No change in transition rate (0.25%) or number of assistant professor positions. (ii) No change in transition rate (0.25%), increase the number of assistant professor positions by 100 per year, beginning in 2015. (iii) Increase transition rate to 10%, and no change in the number of assistant professor positions. (iv) Increase transition rate to 10% and increase the number of assistant professor positions by 100 per year, beginning in 2015.',
                                                                        ),
                                                                ),
                                                            'title' => 'Model predictions of URM assistant professor attainment.',
                                                            'alt' => '',
                                                            'uri' => 'https://publishing-cdn.elifesciences.org/21393/elife-21393-fig5-v2.jpg',
                                                            'id' => 'fig5',
                                                        ),
                                                    2 =>
                                                        array (
                                                            'type' => 'paragraph',
                                                            'text' => 'In 2014, 5.8% of assistant professors in basic science departments were from URM backgrounds. This level of representation is consistent with a transition rate of 0.25% of "other aspire" URM PhDs onto the market (<a href="#SD4-data">Figure 5—source data 1</a>). Given a 0.25% transition rate, short-term simulations (<a href="#fig5">Figure 5A</a>) showed that, increasing the size of URM talent pool or the numbers of assistant professor positions available were not sufficient to increase faculty diversity. Specifically, the model predicted that by 2030, 13.8% of biomedical PhDs would be URMs, but that only 5.9% of assistant professors would be URMs whether the number of assistant professor positions remained the same (<a href="#fig5">Figure 5Ai</a>) or grew by 100 positions annually beginning in 2015 (<a href="#fig5">Figure 5Aii</a>). Put another way, the model predicted that growing the URM PhD pool 53% above current levels (i.e. 13.8% v. the current 9%) would result in a less than 2% increase in the representation of URM assistant professors. Thus, in the presence of a low transition rate, the model predicted that increasing the size of the talent pool or the number of available positions would not lead to a significant increase in the representation of URM assistant professors through 2030.',
                                                        ),
                                                    3 =>
                                                        array (
                                                            'type' => 'paragraph',
                                                            'text' => 'Instead, the simulations predicted that increased diversity would result from increased transition of candidates onto the market and their subsequent hiring. Increasing the transition rate to 10% increased URM representation in the assistant professor pool to between 12.4–12.5% in 2030 given the same (<a href="#fig5">Figure 5Aiii</a>) or increased number of positions available (<a href="#fig5">Figure 5Aiv</a>). That is, increasing the transition rate increased URM faculty representation by more than two-fold above what would be predicted from simply increasing the number of URM scientists exponentially through 2030.',
                                                        ),
                                                    4 =>
                                                        array (
                                                            'type' => 'paragraph',
                                                            'text' => 'To test if there was a threshold above which the URM PhD talent pool was sufficient to result in increased faculty diversity, we conducted simulations through 2080 (with the caveat that as the time horizons extend unforeseen external factors are likely to arise that could attenuate predictive power). The model predicted if the URM PhD population continued to grow at an exponential rate through 2080, 73% of PhDs would be URMs (at which point these populations would no longer be underrepresented). However, in the presence of the 0.25% transition rate, the model predicted that in 2080 fewer than 10% of assistant professors would be URMs, no matter the number of positions available (<a href="#fig5">Figure 5Bi and Bii</a>). In contrast, the simulations predicted that if the transition rate increased to 10%, URM assistant professor representation would be between 56.5-58.3% given the same (<a href="#fig5">Figure 5Biii</a>) or increased number of positions available (<a href="#fig5">Figure 5Biv</a>). Thus, these model simulations indicate that in the short and long-term, given the low transition rate, the size of the URM talent pool, and number of available positions in the overall market had a minimal impact on faculty diversity (even in the absence of labor market discrimination). Instead, increased faculty diversity resulted from ensuring the growing URM PhD and postdoctoral pools transitioned onto the job market and were hired (the impact of other transition rates are shown in <a href="#SD4-data">Figure 5—source data 1</a> and <a href="#SD5-data">2</a>). These simulations assume no racial bias in hiring; the presence of discrimination against URM scientists would attenuate any increases in faculty diversity.',
                                                        ),
                                                ),
                                            'type' => 'section',
                                            'id' => 's2-4',
                                        ),
                                ),
                            'type' => 'section',
                            'id' => 's2',
                        ),
                    2 =>
                        array (
                            'title' => 'Discussion',
                            'content' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'paragraph',
                                            'text' => 'Increasing faculty diversity in academic science departments has been a long-standing challenge and has received renewed attention in recent years (<a href="#bib19">Ginther et al., 2016</a>; <a href="#bib20">Ginther et al., 2011</a>; <a href="#bib22">Griffin, 2016</a>; <a href="#bib6">Duehren and Muluk, 2016</a>; <a href="#bib33">Myers et al., 2012</a>). Here, we used data from medical school basic science departments to highlight the impact of potential intervention strategies on the diversity of assistant professors. By illuminating some of the dynamics with respect to faculty diversity in medical schools, we aim to better understand diversity challenges in other segments of the scientific enterprise (including other university settings, industry, and government).',
                                        ),
                                    1 =>
                                        array (
                                            'type' => 'paragraph',
                                            'text' => 'Although the dearth of URM faculty members in medical schools typically has been framed as a "pipeline" problem—i.e. a lack of available URM talent—our analysis shows that the rate of PhD production for scientists from URM backgrounds has increased significantly over the past 33 years, and at a faster rate than that of WR scientists. Despite this progress, there was no statistical linkage between the size of the pool of URM talent, and the number of URM assistant professors hired in basic science departments of medical schools (<a href="#fig2">Figure 2</a>; imputed values assuming 6-year turnover in assistant professor population; findings hold for longer periods of turnover). These findings suggest a decoupling of PhD production and faculty attainment in these environments for scientists from URM backgrounds. In contrast, WR assistant professor hiring numbers were more closely related to the total number of WR PhD graduates. Therefore, broader changes in the biomedical academic labor market—i.e., more trainees than faculty positions, elongated pathways to independence, and declining research funding (<a href="#bib1">Alberts et al., 2014</a>; <a href="#bib30">McDowell et al., 2014</a>; <a href="#bib28">Larson and Ghaffarzadegan, 2014</a>)–are insufficient to explain differences in faculty attainment between postdoctoral scientists from URM and WR backgrounds.',
                                        ),
                                    2 =>
                                        array (
                                            'type' => 'paragraph',
                                            'text' => 'Obtaining an assistant professorship position requires, at a minimum: (i) a position to be available; (ii) a candidate to be interested in and apply for the position; and (iii) the applicant to be favorably evaluated, offered the position and ultimately accept the position. Systematic data on the applications, evaluations, offers and acceptances for assistant professor candidates in any academic discipline are not typically made available (due to privacy and confidentiality laws), thus we were unable to include this information in the model. However, a recent study has shown that inequality and hierarchy characterize assistant professor hiring across disciplines, and that prestige of doctoral institution plays a major role in who is hired (<a href="#bib4">Clauset et al., 2015</a>). While 80% of Black and Hispanic science PhD graduates obtain their degrees from Carnegie classification research universities (high or very high research activity), this number is lower than the proportion of White and Asian PhD graduates from these institutions (90%) (<a href="#bib44">National Science Foundation, 2015b</a>). Thus, it is possible that part of the difference can be attributed to the nature of the assistant professor hiring process itself, which emphasizes training background. A more in-depth analysis of this aspect of faculty hiring the biomedical sciences remains a topic for future work.',
                                        ),
                                    3 =>
                                        array (
                                            'type' => 'paragraph',
                                            'text' => 'Beyond institutional pedigree, previous work has shown that interest in assistant professor careers at research-intensive universities such as medical schools declines as training progresses (<a href="#bib9">Fuhrmann et al., 2011</a>; <a href="#bib49">Sauermann and Roach, 2012</a>), and these declines are larger for PhDs and postdocs from URM backgrounds relative to their WR counterparts (<a href="#bib17">Gibbs et al., 2015</a>; <a href="#bib16">Gibbs et al., 2014</a>). Importantly, differences in interest in these assistant professor positions between URM and WR scientists remained when controlling for first-author publication rate, advisor relationships, PhD training institution, research self-efficacy, and training experiences (<a href="#bib16">Gibbs et al., 2014</a>). This suggests that there are fundamental aspects of the environment, or nature of faculty work in research-intensive universities that cause otherwise equally qualified URMs to differentially choose other career paths.',
                                        ),
                                    4 =>
                                        array (
                                            'type' => 'paragraph',
                                            'text' => 'Indeed, prominent scientists from URM backgrounds have written about the unique experiences, challenges, and biases (implicit and explicit) faced while conducting science in these environments (<a href="#bib5">Colon Ramos and Quiñones-Hinojosa, 2016</a>; <a href="#bib25">Jarvis, 2015</a>). Further, there is an emerging body of literature on the distinct values that motivate many scientists from URM backgrounds to pursue scientific careers (e.g. giving back to or serving as a role model in their community of origin), the importance of congruence between personal values and career opportunities to fulfill them for scientists of all backgrounds, and the perception that faculty environments at research-intensive institutions such as medical schools may not enable sufficient engagement with the distinct values of URM scientists (<a href="#bib15">Gibbs et al., 2013</a>; <a href="#bib8">Estrada et al., 2011</a>; <a href="#bib56">Thoman et al., 2015</a>; <a href="#bib52">Smith et al., 2014</a>; <a href="#bib47">Powers et al., 2016</a>).',
                                        ),
                                    5 =>
                                        array (
                                            'type' => 'paragraph',
                                            'text' => 'The modeling data we presented indicate that given current rates of transition from PhD to assistant professorship among URMs, the percentage of URM assistant professors in basic science departments of U.S. medical schools could remain below 10% in the short- and long-term (i.e. by 2080), even in the context of exponential growth of the URM PhD and postdoctoral pool and the absence of discrimination. Thus, faculty diversity efforts that rely primarily on enhancing rates of PhD graduates (i.e. “filling the pipeline”) can only have their desired impact if they are coupled with efforts to get these candidates on the market and hired. This would require making faculty positions and work environments attractive and supportive to these scientists, ensuring the proper types of support (e.g. funding, mentorship and sponsorship) to allow URM postdocs to effectively progress to independence (<a href="#bib59">Valantine et al., 2016</a>), and ensuring institutional faculty recruitment, evaluation, and retention processes support scientists from all backgrounds (<a href="#bib12">Gasman, 2016</a>). Such efforts would have to take into account factors such as the broader landscape in which scientists from all backgrounds have greater career options (<a href="#bib45">Nature, 2014</a>), and the specific career development of women from URM backgrounds (<a href="#bib16">Gibbs et al., 2014</a>; <a href="#bib15">Gibbs et al., 2013</a>; <a href="#bib41">National Research Council, 2013</a>) who make up the majority of URM biomedical PhD graduates (<a href="#bib44">National Science Foundation, 2015b</a>).',
                                        ),
                                    6 =>
                                        array (
                                            'type' => 'paragraph',
                                            'text' => 'While the challenge of achieving faculty diversity has been longstanding, with concerted and targeted effort, the numeric realities of assistant professor hiring and turnover mean that higher diversity could be achieved relatively quickly among junior faculty. On average, the pool of assistant professors turns over every six years. The analysis presented here demonstrated that in recent years, assistant professor hiring has been relatively stable at around 1000 positions each year (or roughly 7 assistant professors per institution across all basic science departments annually). Thus, to achieve parity with the pool of PhD graduates (estimated to grow to 10% URM in 2016) would require hiring around 100 URM assistant professors annually at medical schools. Put another way, if roughly two-thirds of medical schools hired (and retained) just one faculty member from an URM background annually for the next six years, the system would reach parity with the PhD pool within one tenure cycle. While this would still not reflect the proportion of people from URM backgrounds in the overall population (currently greater than 30%), this would represent a meaningful first step to addressing the longstanding goal of enhancing scientific excellence by increasing faculty diversity.',
                                        ),
                                ),
                            'type' => 'section',
                            'id' => 's3',
                        ),
                    3 =>
                        array (
                            'title' => 'Materials and methods',
                            'content' =>
                                array (
                                    0 =>
                                        array (
                                            'title' => 'Data sources',
                                            'content' =>
                                                array (
                                                    0 =>
                                                        array (
                                                            'type' => 'paragraph',
                                                            'text' => 'Biomedical PhD attainment data were obtained from the National Science Foundation’s Survey of Earned Doctorates (SED), an annual census of individuals receiving research doctorates from accredited U.S. institutions (<a href="#bib43">National Science Foundation, 2015a</a>), as compiled by the Federation of American Societies for Experimental Biology (FASEB) (<a href="#bib11">Garrison and Campbell, 2015</a>). FASEB tallies and publishes annually the number of PhDs granted in biomedical disciplines (including those who earned PhDs as a single degree or in combination with an MD) from 1980-2013. To calculate the total number of PhD graduates in the U.S., we added together the number of biomedical PhDs awarded to U.S. Citizens and permanent residents, temporary residents, and individuals with unknown citizenship. To calculate the number of PhD graduates from URM backgrounds, we added together the number of U.S. citizen and permanent resident PhD graduates who identified as one of the following: “Black/African-American (non-Hispanic/Latino),” “Hispanic/Latino,” or “American Indian or Alaska Native” (<a href="#bib39">National Institutes of Health, 2015</a>). PhD graduates from all non-URM backgrounds (White, Asian or Pacific Islander, “Other,” “Unknown” and non-citizens) were called “well represented” (WR). These data are shown in <a href="#SD1-data">Figure 1—source data 1</a>.',
                                                        ),
                                                    1 =>
                                                        array (
                                                            'type' => 'paragraph',
                                                            'text' => 'To determine trends in representation of faculty in medical school basic science departments, we obtained faculty data from the AAMC Faculty Roster, 1980-2014 <a href="#bib3">Association of American Medical Colleges. 2015</a>. The AAMC Faculty Roster has collected comprehensive information on the characteristics of full-time faculty members at accredited allopathic U.S. medical schools since 1966. We focused specifically on assistant professors in basic science departments because on average 88% of the faculty members in these departments have earned PhDs (either as a single degree or in combination with and MD). For consistency, assistant professors who identified as “Black,” “Hispanic/Latino,” and “American Indian or Alaska Native” were considered URM. Assistant professors from all other backgrounds were considered WR. These data are also shown in <a href="#SD1-data">Figure 1—source data 1</a>.',
                                                        ),
                                                ),
                                            'type' => 'section',
                                            'id' => 's4-1',
                                        ),
                                    1 =>
                                        array (
                                            'title' => 'Assistant professor hiring trends',
                                            'content' =>
                                                array (
                                                    0 =>
                                                        array (
                                                            'type' => 'paragraph',
                                                            'text' => 'To calculate the aggregate number of assistant professors hired each year, we made two assumptions: (i) the length of time that an individual occupied the position of assistant professor was six years based on traditional academic promotion cycles (<a href="#bib53">Stanford University, 2016</a>; <a href="#bib60">Yale School of Medicine, 2014</a>), and similarly, (ii) one-sixth of the WR and URM assistant professors left the rank of assistant professor in 1980 (either to become associate professors, or pursue other career options). The numbers of assistant professors hired were then imputed based on real changes in the populations of URM and WR assistant professors each year. For example, if the assistant professor population changed from n<sub>1</sub> in year one to n<sub>2</sub> in year two, and the number of assistant professors leaving in year one was l<sub>1</sub>, then the number of assistant professors hired in year two (h<sub>2</sub>) equaled (n<sub>2</sub>-n<sub>1</sub>) + l<sub>1</sub>. Thus, using real data showing that there were n<sub>1</sub>=132 assistant professors from URM backgrounds in 1980, and n<sub>2</sub>=129 in 1981, we assumed that one-sixth of the assistant professors left the rank in year 1980 (l<sub>1</sub>=22), and thus h<sub>2</sub>=19. These data are shown in <a href="#SD2-data">Figure 2—source data 1</a>.',
                                                        ),
                                                    1 =>
                                                        array (
                                                            'type' => 'paragraph',
                                                            'text' => 'Available evidence indicates that scientists who pursue faculty careers in the biomedical sciences remain in postdoctoral training for five or more years (<a href="#bib37">National Institutes of Health, 2012a</a>). To estimate the pool of potential candidates for assistant professor positions, we assumed that PhD graduates (postdocs) remained in the pool of potential candidates for a total of five years, including the year in which they graduated (similar results were found when the length of time in the pool was four or six years). To calculate the pool of available candidates, we totaled the number of PhD graduates in the preceding five years, and subtracted the total number of assistant professors hired in medical school basic science departments in the preceding four years. For example, the pool of available candidates in the year 2010 equaled the sum of the PhD graduates from 2006–2010 less the candidates hired from 2006–2009. The percentage of the pool hired was derived by dividing the number of assistant professors hired each year by the size of the available pool. These data are shown in <a href="#SD3-data">Figure 2—source data 2</a>. These calculations were used to understand the current landscape and the connection between the available talent pool and faculty hiring, but were not used in the system dynamics model described below.',
                                                        ),
                                                    2 =>
                                                        array (
                                                            'type' => 'paragraph',
                                                            'text' => 'To determine the relationships between various constructs, we performed statistical analysis in R (version 3.2.2) (<a href="#bib48">R Core Team, 2015</a>). Specifically, we used a linear regression model to compare the growth of PhD graduates relative to the growth of assistant professors between URM and WR populations, where population relative to 1980 levels was the dependent variable, and independent variables included time (i.e. year), URM status (0= well-represented, 1=underrepresented minority), position (0=assistant professor, 1=PhD graduate), and the interaction between URM status and position. We also calculated Pearson’s correlation coefficient between the size of the candidate pools and the number of assistant professors hired in each group. Finally, we examined how the proportion of the pool hired varied across time using a linear model with proportion assistant professors hired as the dependent variable and year as the independent variable, for scientists from URM and WR backgrounds. All figures were made in GraphPad Prism (version 6) and Adobe Illustrator (version 16.0.4).',
                                                        ),
                                                ),
                                            'type' => 'section',
                                            'id' => 's4-2',
                                        ),
                                    2 =>
                                        array (
                                            'title' => 'System dynamics model of assistant professor hiring',
                                            'content' =>
                                                array (
                                                    0 =>
                                                        array (
                                                            'type' => 'paragraph',
                                                            'text' => 'We used System Dynamics (SD) to create an abstract model (<a href="#bib18">Gilbert, 2007</a>) that could adequately explain macro-scale trends in the transition from the biomedical PhD pool into assistant professor positions in basic science departments at medical schools, and be used to predict the impacts of potential intervention strategies for increasing faculty diversity. We focused on entry into assistant professor positions since these positions turn over more rapidly than the overall faculty pool, and generally pull from recent PhD graduates and postdocs. All other areas of the workforce (i.e. faculty positions in other university contexts, research positions in industry or government, non-research positions occupied by PhDs) as well as longitudinal tracking of individual career transitions are beyond the scope of the model.',
                                                        ),
                                                    1 =>
                                                        array (
                                                            'type' => 'paragraph',
                                                            'text' => 'SD is a modeling framework that emphasizes the role of a system’s structure on its ultimate behavior (<a href="#bib24">Homer and Hirsch, 2006</a>; <a href="#bib31">Meadows, 2008</a>), and has been used along with other approaches to model other aspects of the biomedical workforce and faculty hiring (<a href="#bib13">Ghaffarzadegan et al., 2014</a>; <a href="#bib27">Larson and Diaz, 2012</a>; <a href="#bib14">Ghaffarzadegan et al., 2015</a>). SD models implement these “loop-driven” dynamics through three basic types of elements: (1) stocks, which represent the accumulation of a quantity (e.g. assistant professors) and are represented by boxes; (2) flows, which represent the rate of change in a quantity (e.g. hiring rate for assistant professors), and are represented by hourglasses; and (3) variables, representing factors that can interact with stocks and flows in complex ways (e.g. number of assistant professors slots available), represented by words that have thin, blue causal arrows. In SD diagrams, clouds represent factors that are outside the system boundary, i.e., that extend beyond the range of the model. All modeling was done using Vensim PLE.',
                                                        ),
                                                    2 =>
                                                        array (
                                                            'type' => 'paragraph',
                                                            'text' => 'Our model extends beyond the standard “pipeline” conceptualization of faculty hiring (<a href="#fig3">Figure 3A</a>). There are three stocks accounting for progress from PhD graduation through assistant professor hiring: number of PhD graduates, number of candidates on the market (i.e., those PhD graduates who become postdoctoral scientists and pursue faculty careers), and number of assistant professors. Candidates on the market are hired into the stock of assistant professors at a rate equal to the total number of slots available. New assistant professors remain in the position for six years, at which point they leave the system boundary either through promotion or contract termination (“assistant professor tenure or leave”). Thus, the overarching structure of this model is that the number of assistant professors hired is based on the number of slots available, and the number of candidates pursuing these positions.',
                                                        ),
                                                    3 =>
                                                        array (
                                                            'type' => 'paragraph',
                                                            'text' => 'We expanded upon this standard model in a number of ways (See <a href="#fig3">Figure 3B</a> for intermediate conceptual model, and <a href="#fig3">Figure 3C</a> for final model structure). All equations and initial parameter values are shown in <a href="#AP-tbl1">Appendix—tables 1</a> and <a href="#AP-tbl2">2</a>, and the final model is in the source code. Based on the analysis presented in <a href="#fig2">Figure 2</a>, and the distinct underlying patterns with respect to assistant professor position attainment after PhD completion, we separated the pathways for the career progression of URM and WR scientists. Further, for both URM and WR scientists, we assumed there was a fixed proportion of people who would pursue and enter assistant professor positions in medical school basic science departments (called “faculty aspire”), and all other PhDs would pursue careers in other sectors (called, “other aspire”; this can include research careers outside of academia, faculty careers in teaching-intensive environments, or careers away from bench research) (<a href="#bib9">Fuhrmann et al., 2011</a>; <a href="#bib17">Gibbs et al., 2015</a>; <a href="#bib15">Gibbs et al., 2013</a>).',
                                                        ),
                                                    4 =>
                                                        array (
                                                            'type' => 'paragraph',
                                                            'text' => 'The number of “faculty aspire” candidates is based upon the number of URM and WR assistant professors hired in the period of 1980-1997 (prior to the NIH budget doubling which lead a significant expansion in the number of biomedical PhDs). Without intervention, as the total number of PhD graduates grows, the pools of “URM faculty aspire,” “URM other aspire,” “WR faculty aspire,” and “WR other aspire” are expected grow proportionally. The overall PhD graduate growth rate is represented as a variable termed “baseline PhD graduate growth rate.” This is a piecewise linear function that mirrors the actual growth in the overall number of PhD graduates from 1980- 2013.',
                                                        ),
                                                    5 =>
                                                        array (
                                                            'type' => 'paragraph',
                                                            'text' => 'The model assumes all PhD graduates in the “faculty aspire” stock pursue assistant professorships in research-intensive environments. The remaining graduates pursue other careers and depart the system. Each year, the system attempts to fill all “slots available.” Further, depending on market hiring conditions, 20% of the candidates on the market drop out of the market annually. That is, if the probability of being hired is relatively high (&gt;20%) all candidates remain on the market that year. Otherwise, one-fifth of the available pool drops out of the system. Thus, the “half-life” of a candidate on the market who is not hired is 5 years (similar to the current period of postdoctoral training for candidates pursuing faculty positions in research intensive environments [<a href="#bib37">National Institutes of Health, 2012a</a>]).',
                                                        ),
                                                    6 =>
                                                        array (
                                                            'type' => 'paragraph',
                                                            'text' => 'Candidates are chosen from the stocks of WR and URM candidates in proportion to their respective representations on the market. For example, if there are 100 slots available, and 25% of the candidates on the market are from URM backgrounds and 75% are from WR backgrounds, then 25 slots will be filled by URMs and 75 slots will be filled by WRs. Although the career development pathways for WR and URM students are separate, the total number of assistant professor slots available links them. If there are not enough candidates to fill all slots, these slots are removed from the system. Specifically, we posit that candidates in a specific group (URM or WR) are hired with likelihood proportional to their representation on the market. That is, the model posits no hiring bias.',
                                                        ),
                                                    7 =>
                                                        array (
                                                            'type' => 'paragraph',
                                                            'text' => 'Beyond the baseline student growth rate, “URM target growth rate” (<a href="#fig3">Figure 3C</a>) is a variable that represents the concerted effort of the scientific community (e.g. funders, institutions, scientific societies) to increase the representation of scientists from URM backgrounds in the PhD pool over and above what would occur with natural system growth. This growth rate increases exponentially throughout the duration of the model, matching the empirical trend of URM biomedical PhD population growth from 1980-2013. The “URM target growth rate” is conceptualized as the result of external intervention; thus, these additional URM scientists are initially added to the “URM other aspire” stock. For model simulations, the overall number of scientists in the “URM other aspire” stock is the greater of either the baseline growth rate, or the URM target growth rate. A proportion of URM PhD graduates who begin in the “other aspire” stock may then choose to pursue a faculty career. The “transition rate” is a free parameter that represents the proportion of URM "other aspire" graduates that choose to pursue faculty careers Because there has not been similar intervention to increase the number of scientists from WR backgrounds entering the PhD pool and faculty market, they do not have a transition rate. Thus, the total number of URM candidates on the market is equal to the number who would have entered the market in proportion to the overall growth of the system (i.e. "URM Faculty Aspire"), and the number who entered as a result of external intervention and then chose to pursue faculty careers (i.e. “URM Other Aspire” scientists who transition) minus those who have dropped out of the market ("URM Market Dropout").',
                                                        ),
                                                    8 =>
                                                        array (
                                                            'type' => 'paragraph',
                                                            'text' => 'To determine the initial number of faculty aspire candidates for both URM and WR scientists (“Faculty Aspire P<sub>0</sub>”) we used the average number of assistant professors hired from 1980-1997, corresponding to the period before the NIH budget doubling, which drove significant growth of the biomedical enterprise (<a href="#bib26">Johnson, 2013</a>). The value of “URM Faculty Aspire P<sub>0</sub>” is 34.4, and “WR Faculty Aspire P<sub>0</sub>” is 567.7. The growth rates for each population (UR or WR) were then scaled to match empirical trends, resulting in numbers of PhD graduates. The patterns of growth differed between scientists from WR and URM backgrounds (piecewise linear and exponential respectively). Thus, for scientists from WR backgrounds, we used the difference between the 1980 population of PhD graduates and “WR Faculty Aspire” candidates to calculate the “WR other aspire P<sub>0</sub>.” For URM scientists, we fit an exponential function to URM student growth data and used the associated coefficient to derive the “URM other aspire P<sub>0</sub>”.',
                                                        ),
                                                    9 =>
                                                        array (
                                                            'type' => 'paragraph',
                                                            'text' => 'Finally, the number of assistant professor “slots available” is a piecewise function fit to data imputed from historical counts of assistant professors. Specifically, we made the simplifying assumption that there were a fixed number of slots available per year (i.e., flat hiring), with a step increase in 1998, when the NIH budget-doubling lead to an era of expansion in the biomedical sciences. Thus, the numbers of slots available from 1980-1997 (n=602.1 slots), and 1998-2013 (n=1064.7 slots) represent the average number of total assistant professors hired during these periods. The final model structure is shown in <a href="#fig3">Figure 3C</a> (the source code has model file).',
                                                        ),
                                                ),
                                            'type' => 'section',
                                            'id' => 's4-3',
                                        ),
                                    3 =>
                                        array (
                                            'title' => 'Limitations',
                                            'content' =>
                                                array (
                                                    0 =>
                                                        array (
                                                            'type' => 'paragraph',
                                                            'text' => 'There are a number of limitations to the analyses presented. Postdoctoral training has become an almost uniform prerequisite to obtaining a faculty position in biomedical research. There are no reliable estimates on the number of postdocs in the US (currently or historically), thus these data were not included in the model (<a href="#bib34">National Academy of Sciences NAoE, and Institute of Medicine, 2014</a>). However, available data suggest comparable postdoctoral transition rates across race/ethnicity for PhD graduates (<a href="#bib44">National Science Foundation, 2015b</a>). Further, we recognize that scientists from URM and WR groups are not all uniform (i.e. there are differences across race/ethnicity groups, and between them by dimensions including but not limited to socioeconomic background). However, the small numbers of scientists from any individual URM group on the faculty did not allow for further disaggregation and separate modeling of URM populations. Additionally, some scientists (from all racial-ethnic backgrounds) complete their training outside of the U.S., and then obtain faculty positions within the U.S. For example, a Black or Hispanic scientist who completed their training outside of the U.S., and then obtained a faculty position within the U.S. would be counted as a URM faculty member, even though they were not part of the URM PhD pool (which only includes U.S. Citizens and Permanent Residents who completed their training within the U.S.). There are no systematic data available on the numbers of scientists from either WR or URM racial-ethnic backgrounds who fit this category (<a href="#bib37">National Institutes of Health, 2012a</a>), thus these data were not included in the model. From the perspective of examining the transition from PhD to assistant professor in medical school basic science departments, a central focus of this work, the entry of scientists that identify as being part of an URM group into faculty positions but who were not trained in the U.S. would lead to an overestimation of the proportion of URM PhD graduates hired as assistant professors. Finally, between the period of 1980-2013, many universities adopted policies that allow for flexibility in the traditional six-year tenure clock (<a href="#bib2">American Association of University Professors, 2004</a>). Thus, our assumption of a fixed, six-year tenure clock may also lead to an overestimation of the number of assistant professors hired each year, but it is consistent with the standard timeframe used by number of leading institutions (<a href="#bib53">Stanford University, 2016</a>; <a href="#bib60">Yale School of Medicine, 2014</a>).',
                                                        ),
                                                ),
                                            'type' => 'section',
                                            'id' => 's4-4',
                                        ),
                                ),
                            'type' => 'section',
                            'id' => 's4',
                        ),
                ),
            'decisionLetter' =>
                array (
                    'description' =>
                        array (
                            0 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => 'In the interests of transparency, eLife includes the editorial decision letter and accompanying author responses. A lightly edited version of the letter sent to the authors after peer review is shown, indicating the most substantive concerns; minor comments are not usually included.',
                                ),
                        ),
                    'content' =>
                        array (
                            0 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => 'Thank you for submitting your article "Decoupling of the Minority PhD Talent Pool &amp; Assistant Professor Hiring in Medical School Basic Science Departments" to <i>eLife</i> for consideration as a Feature Article. Your article has been reviewed by two peer reviewers and the <i>eLife</i> Features Editor, and this decision letter has been compiled to help you prepare a revised submission.',
                                ),
                            1 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => 'Summary:',
                                ),
                            2 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => 'This paper attempts to examine issues related to the hiring and retention of PhD underrepresented minorities (URM) in assistant professor positions at academic medical centers. It uses a system dynamics (SD) model to assess expectations of how many PhD URM individuals we should expect to see entering assistant professor positions. While others (Myers & Husbands-Fealing, 2012; Heggeness et al. 2016) have examined issues of representation along the \'pipeline,\' this work expands on those efforts by examining specifically issues related to hiring and the flow and stock of assistant professors in academic medicine centers and, specifically, URM hiring. Additionally, the extention to an SD model is a unique analysis for this population and with this data.',
                                ),
                            3 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => 'Essential revisions:',
                                ),
                            4 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => '1) This might be a discipline issue, but I find it confusing that in the body of the paper and in the figures, the data source is not cited! It is only cited in the back as an appendix of sorts. Data sources should be cited throughout the text and at the bottom of each figure.',
                                ),
                            5 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => '2) Equation documentation should improve. In your appendix you should use more conventional approaches for model documentation than simple copy-paste of Vensim formula. Also, report all your parameters in a table with proper references (fine if it appears in the Appendix). For model documentation example, see other SD works such as Ghaffarzadegan, Hawley and Desai, 2014.',
                                ),
                            6 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => '3) Definitions of subgroups need to be more precise. Instead of saying "including[…]" or "(i.e. white)," precise definitions should be clearly articulated within the paper of exactly how subgroups are defined.',
                                ),
                            7 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => '4) One of the weaknesses of an SD model is that you are not able to account for individual agents\' behavior, like in agent-based models. Lots of changes in the external environment (e.g. changes in funding streams, policies, and alternative opportunities) have the potential to influence an individual agent\'s actions in ways that are not necessarily linear and not accounted for in the model the authors present.',
                                ),
                            8 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => '5) While the authors acknowledge the issue of postdocs in the supporting documentation, they do not even mention postdocs in the main paper. The reality is that hardly anyone transitions directly from PhD receipt to an assistant professor position, and the postdoc experience is extremely diverse. What if the differences the authors are seeing here are not a result of stalled entrance into the assistant professor position, but rather stalled entrance into a postdoc that will make the individual attractive for an assistant professor position. This dilemma and absence in their model must, at a minimum, be discussed in the body of the paper. Ideally, the authors would be able to incorporate some assumptions about the postdoc phase into their model.',
                                ),
                            9 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => '6) The authors have no data on who is applying for assistant professor positions (as they acknowledge in the third paragraph of the Discussion). Therefore, there is no way to really claim, as they do, that if institutions increased their efforts to hire more URM, this would increase diversity in the assistant professor pool.',
                                ),
                            10 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => '7) In the main model there is no drop-out from the pool of people in the market (that is, people stay in the market forever). I see that in your sensitivity analysis you report that you have conducted an analysis of effect of drop-out from the pool of people in the market. Very good, but I would argue that this should be in the main model. You simulate the model until 2080, and by then the whole population has retired and many have died! So, simply replace the results of your sensitivity analysis as the main analysis. I understand that this might not affect the results, but it is a better modeling practice.',
                                ),
                            11 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => '8) The simulation period of 55 years in future is simply too long. And the assumption that 73% of PhD graduates will be URM feels unrealistic unless you provide evidence (if 73% of a population are minorities, then they are ORM: over-represented minorities!). I suggest the authors to simulate for the next 1-2 decades; there are many things that can happen until 2080 which your model cannot predict and are out of the boundary of your analysis.',
                                ),
                            12 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => '9) One may argue that the reason "URM Faculty Aspire P0" is much smaller than the "WR Faculty Aspire P0" is that you are assuming that hiring in faculty positions is proportional to population of the pools. URM might be weaker in the market or be discriminated. From a modeling standpoint, your model has two degrees of freedom, if you assume there is no "weight" toward hiring WR relative to URM, you end up with much higher "WR Faculty Aspire P0" anyway. I think the best way, but difficult, is to provide some references for this argument (that there is less faculty aspiration among URM). The easier way is to clarify that you are aware of this assumption and discuss its implications in your policy recommendation. You may need to modify your language throughout the paper too.',
                                ),
                        ),
                    'doi' => '10.7554/eLife.21393.017',
                ),
            'statusDate' => '2016-12-12T10:21:43Z',
            'volume' => 5,
            'authors' =>
                array (
                    0 =>
                        array (
                            'contribution' => 'KDG, Conception and design, Acquisition of data, Analysis and interpretation of data, Drafting or revising the article',
                            'type' => 'person',
                            'emailAddresses' =>
                                array (
                                    0 => 'kgibbsjr@gmail.com',
                                ),
                            'orcid' => '0000-0002-3532-5396',
                            'name' =>
                                array (
                                    'preferred' => 'Kenneth D Gibbs Jr',
                                    'index' => 'Gibbs, Kenneth D, Jr',
                                ),
                            'affiliations' =>
                                array (
                                    0 =>
                                        array (
                                            'name' =>
                                                array (
                                                    0 => 'Office of Program Planning, Analysis and Evaluation',
                                                    1 => 'National Institute of General Medical Sciences',
                                                ),
                                            'address' =>
                                                array (
                                                    'components' =>
                                                        array (
                                                            'country' => 'United States',
                                                            'locality' =>
                                                                array (
                                                                    0 => 'Bethesda',
                                                                ),
                                                        ),
                                                    'formatted' =>
                                                        array (
                                                            0 => 'Bethesda',
                                                            1 => 'United States',
                                                        ),
                                                ),
                                        ),
                                ),
                            'competingInterests' => 'The authors declare that no competing interests exist.',
                        ),
                    1 =>
                        array (
                            'contribution' => 'JB, Conducted analysis and wrote manuscript, Analysis and interpretation of data',
                            'type' => 'person',
                            'orcid' => '0000-0002-0521-3078',
                            'name' =>
                                array (
                                    'preferred' => 'Jacob Basson',
                                    'index' => 'Basson, Jacob',
                                ),
                            'affiliations' =>
                                array (
                                    0 =>
                                        array (
                                            'name' =>
                                                array (
                                                    0 => 'Office of Program Planning, Analysis and Evaluation',
                                                    1 => 'National Institute of General Medical Sciences',
                                                ),
                                            'address' =>
                                                array (
                                                    'components' =>
                                                        array (
                                                            'country' => 'United States',
                                                            'locality' =>
                                                                array (
                                                                    0 => 'Bethesda',
                                                                ),
                                                        ),
                                                    'formatted' =>
                                                        array (
                                                            0 => 'Bethesda',
                                                            1 => 'United States',
                                                        ),
                                                ),
                                        ),
                                ),
                            'competingInterests' => 'The authors declare that no competing interests exist.',
                        ),
                    2 =>
                        array (
                            'contribution' => 'IMX, Managed data collection and wrote manuscript, Acquisition of data',
                            'affiliations' =>
                                array (
                                    0 =>
                                        array (
                                            'name' =>
                                                array (
                                                    0 => 'Public Health and Diversity Initiative',
                                                    1 => 'Association of American Medical Colleges',
                                                ),
                                            'address' =>
                                                array (
                                                    'components' =>
                                                        array (
                                                            'country' => 'United States',
                                                            'locality' =>
                                                                array (
                                                                    0 => 'Washington',
                                                                ),
                                                        ),
                                                    'formatted' =>
                                                        array (
                                                            0 => 'Washington',
                                                            1 => 'United States',
                                                        ),
                                                ),
                                        ),
                                ),
                            'type' => 'person',
                            'name' =>
                                array (
                                    'preferred' => 'Imam M Xierali',
                                    'index' => 'Xierali, Imam M',
                                ),
                            'competingInterests' => 'The authors declare that no competing interests exist.',
                        ),
                    3 =>
                        array (
                            'contribution' => 'DAB, Conception and design, Analysis and interpretation of data, Drafting or revising the article',
                            'type' => 'person',
                            'orcid' => '0000-0002-3302-9497',
                            'name' =>
                                array (
                                    'preferred' => 'David A Broniatowski',
                                    'index' => 'Broniatowski, David A',
                                ),
                            'affiliations' =>
                                array (
                                    0 =>
                                        array (
                                            'name' =>
                                                array (
                                                    0 => 'Department of Engineering Management and Systems Engineering',
                                                    1 => 'The George Washington University',
                                                ),
                                            'address' =>
                                                array (
                                                    'components' =>
                                                        array (
                                                            'country' => 'United States',
                                                            'locality' =>
                                                                array (
                                                                    0 => 'Washington',
                                                                ),
                                                        ),
                                                    'formatted' =>
                                                        array (
                                                            0 => 'Washington',
                                                            1 => 'United States',
                                                        ),
                                                ),
                                        ),
                                ),
                            'competingInterests' => 'The authors declare that no competing interests exist.',
                        ),
                ),
            'id' => '21393',
            'published' => '2016-11-17T00:00:00Z',
            'subjects' =>
                array (
                ),
            'impactStatement' => 'A systems-level analysis of the biomedical workforce in the US shows that current strategies to enhance faculty diversity are unlikely to have a significant impact, and that there is a need to increase the number of PhDs from underrepresented minority backgrounds who move on to postdoctoral positions.',
            'funding' =>
                array (
                    'statement' => 'No external funding was received for this work.',
                ),
            'titlePrefix' => 'Research',
            'appendices' =>
                array (
                    0 =>
                        array (
                            'title' => 'Appendix 1',
                            'content' =>
                                array (
                                    0 =>
                                        array (
                                            'title' => 'Model equations and parameter values',
                                            'content' =>
                                                array (
                                                    0 =>
                                                        array (
                                                            'type' => 'table',
                                                            'tables' =>
                                                                array (
                                                                    0 => '<table><thead><tr><th valign="top">Notation</th><th valign="top">Description</th><th valign="top">Formulation</th></tr></thead><tbody><tr><td valign="top"><p>UTG</p></td><td valign="top"><p>URM Target Growth Rate</p></td><td valign="top"><p><math id="inf1"><mrow><mtext>exp</mtext><mo>(</mo><mi>t</mi><mo>*</mo><msub><mi>C</mi><mrow><mi>U</mi><mi>T</mi><mi>G</mi></mrow></msub><mo>)</mo></mrow></math></p></td></tr><tr><td valign="top"><p>GR<sub>WR,Other</sub></p></td><td valign="top"><p>WR Non-Faculty Student Growth Rate</p></td><td valign="top"><p>BSG * P<sub>0,WR,Other</sub></p></td></tr><tr><td valign="top"><p>GR<sub>WR,Faculty</sub></p></td><td valign="top"><p>WR Faculty Student Growth Rate</p></td><td valign="top"><p>BSG * P<sub>0,WR,Faculty</sub></p></td></tr><tr><td valign="top"><p>GR<sub>URM,Other</sub></p></td><td valign="top"><p>URM Non-Faculty Student Growth Rate</p></td><td valign="top"><p>BSG * P<sub>0,URM,Other</sub></p></td></tr><tr><td valign="top"><p>GR<sub>URM,Faculty</sub></p></td><td valign="top"><p>URM Faculty Student Growth Rate</p></td><td valign="top"><p>MAX(BSG * P<sub>0,URM,Faculty</sub>, UTG * P<sub>0,URM,Faculty</sub>)</p></td></tr><tr><td valign="top"><p>PHD<sub>WR,Other</sub></p></td><td valign="top"><p>WR Non-Faculty PHD Graduates</p></td><td valign="top"><p>PHD<sub>WR,Other,0</sub><math id="inf2"><mrow><mo>+</mo><msup><mstyle displaystyle="true" mathsize="140%"><mo>∫</mo></mstyle><mtext>​</mtext></msup><mi>G</mi><msub><mi>R</mi><mrow><mi>W</mi><mi>R</mi><mo>,</mo><mi>O</mi><mi>t</mi><mi>h</mi><mi>e</mi><mi>r</mi></mrow></msub><mo>−</mo><mi>D</mi><msub><mi>R</mi><mrow><mi>W</mi><mi>R</mi><mo>,</mo><mi>O</mi><mi>t</mi><mi>h</mi><mi>e</mi><mi>r</mi></mrow></msub><mi>d</mi><mi>t</mi></mrow></math></p></td></tr><tr><td valign="top"><p>PHD<sub>WR,Faculty</sub></p></td><td valign="top"><p>WR Faculty Student PHD Graduates</p></td><td valign="top"><p>PHD<sub>WR,Faculty,0</sub><math id="inf3"><mrow><mo>+</mo><msup><mstyle displaystyle="true" mathsize="140%"><mo>∫</mo></mstyle><mtext>​</mtext></msup><mi>G</mi><msub><mi>R</mi><mrow><mi>W</mi><mi>R</mi><mo>,</mo><mi>F</mi><mi>a</mi><mi>c</mi><mi>u</mi><mi>l</mi><mi>t</mi><mi>y</mi></mrow></msub><mo>−</mo><mi>M</mi><msub><mi>R</mi><mrow><mi>W</mi><mi>R</mi><mo>,</mo><mi>F</mi><mi>a</mi><mi>c</mi><mi>u</mi><mi>l</mi><mi>t</mi><mi>y</mi></mrow></msub><mi>d</mi><mi>t</mi></mrow></math></p></td></tr><tr><td valign="top"><p>PHD<sub>URM,Other</sub></p></td><td valign="top"><p>URM Non-Faculty PHD Graduates</p></td><td valign="top"><p>PHD<sub>URM,Other,0</sub><math id="inf4"><mrow><mo>+</mo><msup><mstyle displaystyle="true" mathsize="140%"><mo>∫</mo></mstyle><mtext>​</mtext></msup><mi>G</mi><msub><mi>R</mi><mrow><mi>U</mi><mi>R</mi><mi>M</mi><mo>,</mo><mi>O</mi><mi>t</mi><mi>h</mi><mi>e</mi><mi>r</mi></mrow></msub><mo>−</mo><mi>D</mi><msub><mi>R</mi><mrow><mi>U</mi><mi>R</mi><mi>M</mi><mo>,</mo><mi>O</mi><mi>t</mi><mi>h</mi><mi>e</mi><mi>r</mi></mrow></msub><mi>d</mi><mi>t</mi></mrow></math></p></td></tr><tr><td valign="top"><p>PHD<sub>URM,Faculty</sub></p></td><td valign="top"><p>URM Faculty PHD Graduates</p></td><td valign="top"><p>PHD<sub>URM,Faculty,0</sub><math id="inf5"><mrow><mo>+</mo><msup><mstyle displaystyle="true" mathsize="140%"><mo>∫</mo></mstyle><mtext>​</mtext></msup><mi>G</mi><msub><mi>R</mi><mrow><mi>U</mi><mi>R</mi><mi>M</mi><mo>,</mo><mi>F</mi><mi>a</mi><mi>c</mi><mi>u</mi><mi>l</mi><mi>t</mi><mi>y</mi></mrow></msub><mo>−</mo><mi>M</mi><msub><mi>R</mi><mrow><mi>U</mi><mi>R</mi><mi>M</mi><mo>,</mo><mi>F</mi><mi>a</mi><mi>c</mi><mi>u</mi><mi>l</mi><mi>t</mi><mi>y</mi></mrow></msub><mo>−</mo><mi>T</mi><msub><mi>R</mi><mrow><mi>U</mi><mi>R</mi><mi>M</mi><mo>,</mo><mi>F</mi><mi>a</mi><mi>c</mi><mi>u</mi><mi>l</mi><mi>t</mi><mi>y</mi></mrow></msub><mi>d</mi><mi>t</mi></mrow></math></p></td></tr><tr><td valign="top"><p>DR<sub>WR,Other</sub></p></td><td valign="top"><p>WR Non-Faculty Student Departure Rate</p></td><td valign="top"><p>PHD<sub>WR.Other</sub></p></td></tr><tr><td valign="top"><p>MR<sub>WR,Faculty</sub></p></td><td valign="top"><p>WR Faculty Student Market Entrance Rate</p></td><td valign="top"><p>PHD<sub>WR.Faculty</sub></p></td></tr><tr><td valign="top"><p>DR<sub>URM,Other</sub></p></td><td valign="top"><p>WR Non-Faculty Student Market Entrance Rate</p></td><td valign="top"><p>PHD<sub>WR.Other</sub></p></td></tr><tr><td valign="top"><p>MR<sub>URM,Faculty</sub></p></td><td valign="top"><p>WR Faculty Student Market Transition Rate</p></td><td valign="top"><p>C<sub>UTR</sub>*PHD<sub>URM.Faculty</sub></p></td></tr><tr><td valign="top"><p>TR<sub>URM,Faculty</sub></p></td><td valign="top"><p>WR Faculty Student Departure Rate</p></td><td valign="top"><p>(1-C<sub>UTR</sub>)*PHD<sub>URM.Faculty</sub></p></td></tr><tr><td valign="top"><p>PD<sub>WR</sub></p></td><td valign="top"><p>WR Candidates on the Market (e.g., Postdocs)</p></td><td valign="top"><p>PD<sub>WR, 0</sub><math id="inf6"><mrow><mo>+</mo><msup><mstyle displaystyle="true" mathsize="140%"><mo>∫</mo></mstyle><mtext>​</mtext></msup><mi>M</mi><msub><mi>R</mi><mrow><mi>W</mi><mi>R</mi><mo>,</mo><mi>F</mi><mi>a</mi><mi>c</mi><mi>u</mi><mi>l</mi><mi>t</mi><mi>y</mi></mrow></msub><mo>−</mo><mi>H</mi><msub><mi>R</mi><mrow><mi>W</mi><mi>R</mi></mrow></msub><mo>−</mo><mi>D</mi><msub><mi>R</mi><mrow><mi>W</mi><mi>R</mi><mo>,</mo><mo> </mo><mi>F</mi><mi>a</mi><mi>c</mi><mi>u</mi><mi>l</mi><mi>t</mi><mi>y</mi></mrow></msub><mi>d</mi><mi>t</mi></mrow></math></p></td></tr><tr><td valign="top"><p>PD<sub>URM</sub></p></td><td valign="top"><p>URM Candidates on the Market (e.g., Postdocs)</p></td><td valign="top"><p>PD<sub>URM,0</sub><math id="inf7"><mrow><mo>+</mo><msup><mstyle displaystyle="true" mathsize="140%"><mo>∫</mo></mstyle><mtext>​</mtext></msup><mi>M</mi><msub><mi>R</mi><mrow><mi>U</mi><mi>R</mi><mi>M</mi><mo>,</mo><mi>F</mi><mi>a</mi><mi>c</mi><mi>u</mi><mi>l</mi><mi>t</mi><mi>y</mi></mrow></msub><mo>−</mo><mi>H</mi><msub><mi>R</mi><mrow><mi>U</mi><mi>R</mi><mi>M</mi></mrow></msub><mo>−</mo><mi>D</mi><msub><mi>R</mi><mrow><mi>U</mi><mi>R</mi><mi>M</mi><mo>,</mo><mo> </mo><mi>F</mi><mi>a</mi><mi>c</mi><mi>u</mi><mi>l</mi><mi>t</mi><mi>y</mi></mrow></msub><mi>d</mi><mi>t</mi></mrow></math></p></td></tr><tr><td valign="top"><p>π<sub>URM</sub></p></td><td valign="top"><p>Proportion of URM candidates on the market</p></td><td valign="top"><p>PD<sub>URM</sub>/(PD<sub>URM</sub>+ PD<sub>WR</sub>)</p></td></tr><tr><td valign="top"><p>HR<sub>WR</sub></p></td><td valign="top"><p>Hiring rate of WR candidates</p></td><td valign="top"><p>MIN[PD<sub>WR</sub>,S*(1- π<sub>URM</sub>)]</p></td></tr><tr><td valign="top"><p>HR<sub>URM</sub></p></td><td valign="top"><p>Hiring rate of URM candidates</p></td><td valign="top"><p>MIN(PD<sub>URM</sub>,S*π<sub>URM</sub>)</p></td></tr><tr><td valign="top"><p>DR<sub>WR,Faculty</sub></p></td><td valign="top"><p>WR Faculty Student Departure Rate</p></td><td valign="top"><p><math id="inf8"><mrow><mrow><mo>{</mo> <mrow><mtable><mtr><mtd><mn>0</mn></mtd><mtd><mrow><mi>i</mi><mi>f</mi><mtext> </mtext><mi>H</mi><msub><mi>R</mi><mrow><mi>W</mi><mi>R</mi></mrow></msub><mo>&lt;</mo><mfrac><mrow><mi>P</mi><msub><mi>D</mi><mrow><mi>W</mi><mi>R</mi></mrow></msub></mrow><mn>5</mn></mfrac></mrow></mtd></mtr><mtr><mtd><mrow><mfrac><mrow><mi>P</mi><msub><mi>D</mi><mrow><mi>W</mi><mi>R</mi></mrow></msub></mrow><mn>5</mn></mfrac></mrow></mtd><mtd><mrow><mi>o</mi><mi>t</mi><mi>h</mi><mi>e</mi><mi>r</mi><mi>w</mi><mi>i</mi><mi>s</mi><mi>e</mi></mrow></mtd></mtr></mtable></mrow> </mrow></mrow></math></p></td></tr><tr><td valign="top"><p>DR<sub>URM,Faculty</sub></p></td><td valign="top"><p>URM Faculty Student Departure Rate</p></td><td valign="top"><p><math id="inf9"><mrow><mrow><mo>{</mo> <mrow><mtable><mtr><mtd><mn>0</mn></mtd><mtd><mrow><mi>i</mi><mi>f</mi><mtext> </mtext><mi>H</mi><msub><mi>R</mi><mrow><mi>U</mi><mi>R</mi><mi>M</mi></mrow></msub><mo>&lt;</mo><mfrac><mrow><mi>P</mi><msub><mi>D</mi><mrow><mi>U</mi><mi>R</mi><mi>M</mi></mrow></msub></mrow><mn>5</mn></mfrac></mrow></mtd></mtr><mtr><mtd><mrow><mfrac><mrow><mi>P</mi><msub><mi>D</mi><mrow><mi>U</mi><mi>R</mi><mi>M</mi></mrow></msub></mrow><mn>5</mn></mfrac></mrow></mtd><mtd><mrow><mi>o</mi><mi>t</mi><mi>h</mi><mi>e</mi><mi>r</mi><mi>w</mi><mi>i</mi><mi>s</mi><mi>e</mi></mrow></mtd></mtr></mtable></mrow> </mrow></mrow></math></p></td></tr><tr><td valign="top"><p>AP<sub>WR</sub></p></td><td valign="top"><p>WR Assistant Professors</p></td><td valign="top"><p>AP<sub>WR, 0</sub><math id="inf10"><mrow><mo>+</mo><msup><mstyle displaystyle="true" mathsize="140%"><mo>∫</mo></mstyle><mtext>​</mtext></msup><mi>H</mi><msub><mi>R</mi><mrow><mi>W</mi><mi>R</mi></mrow></msub><mo>−</mo><mi>H</mi><msub><mi>R</mi><mrow><mi>W</mi><mi>R</mi><mo>,</mo><mi>t</mi><mo>−</mo><mn>6</mn></mrow></msub><mi>d</mi><mi>t</mi></mrow></math></p></td></tr><tr><td valign="top"><p>AP<sub>URM</sub></p></td><td valign="top"><p>URM Assistant Professors</p></td><td valign="top"><p>AP<sub>URM,0</sub><math id="inf11"><mrow><mo>+</mo><msup><mstyle displaystyle="true" mathsize="140%"><mo>∫</mo></mstyle><mtext>​</mtext></msup><mi>H</mi><msub><mi>R</mi><mrow><mi>U</mi><mi>R</mi><mi>M</mi></mrow></msub><mo>−</mo><mi>H</mi><msub><mi>R</mi><mrow><mi>U</mi><mi>R</mi><mi>M</mi><mo>,</mo><mo> </mo><mi>t</mi><mo>−</mo><mn>6</mn></mrow></msub><mi>d</mi><mi>t</mi></mrow></math></p></td></tr></tbody></table>',
                                                                ),
                                                            'label' => 'Appendix 1—table 1.',
                                                            'doi' => '10.7554/eLife.21393.014',
                                                            'caption' =>
                                                                array (
                                                                    0 =>
                                                                        array (
                                                                            'type' => 'paragraph',
                                                                            'text' => 'Model formulation.',
                                                                        ),
                                                                ),
                                                            'title' => 'Model formulation.',
                                                            'footnotes' =>
                                                                array (
                                                                    0 =>
                                                                        array (
                                                                            'text' =>
                                                                                array (
                                                                                    0 =>
                                                                                        array (
                                                                                            'type' => 'paragraph',
                                                                                            'text' => 'Note: <math id="inf12"><mrow><mi>H</mi><msub><mi>R</mi><mrow><mo>.</mo><mo>,</mo><mi>t</mi><mo>−</mo><mn>6</mn></mrow></msub></mrow></math> denotes hiring rate of assistant professors delayed by six time steps (i.e., the length of a tenure cycle). For timesteps &lt;7, <math id="inf13"><mrow><mi>H</mi><msub><mi>R</mi><mrow><mo>.</mo><mo>,</mo><mi>t</mi><mo>−</mo><mn>6</mn></mrow></msub></mrow></math> is calculated by amortization of the initial value of assistant professors AP<sub>., 0</sub>.',
                                                                                        ),
                                                                                ),
                                                                        ),
                                                                ),
                                                            'id' => 'AP-tbl1',
                                                        ),
                                                    1 =>
                                                        array (
                                                            'type' => 'table',
                                                            'tables' =>
                                                                array (
                                                                    0 => '<table><thead><tr><th valign="top">Notation</th><th valign="top">Description</th><th valign="top">Value</th><th valign="top">Source</th></tr></thead><tbody><tr><td valign="top"><p>P<sub>0,URM,Faculty</sub></p></td><td valign="top"><p>URM Faculty Student Growth Rate Multiplier</p></td><td valign="top"><p>34.44</p></td><td valign="top"><p><b>AAMC Faculty Roster</b> (Imputed values, URM hiring 1980-1997)</p> </td></tr><tr><td valign="top"><p>P<sub>0,URM,Other</sub></p></td><td valign="top"><p>URM Non-Faculty Student Growth Rate Multiplier</p></td><td valign="top"><p>64</p></td><td valign="top"><p><b>AAMC Faculty Roster</b> (Exponential fit of URM PhD graduate growth and imputed URM hiring 1980-1997)</p> </td></tr><tr><td valign="top"><p>P<sub>0,WR,Faculty</sub></p></td><td valign="top"><p>WR Faculty Student Growth Rate Multiplier</p></td><td valign="top"><p>566.67</p></td><td valign="top"><p><b>AAMC Faculty Roster</b> (Imputed values, WR hiring 1980-1997)</p> </td></tr><tr><td valign="top"><p>P<sub>0,WR,Other</sub></p></td><td valign="top"><p>WR Non-Faculty Student Growth Rate Multiplier</p></td><td valign="top"><p>3500</p></td><td valign="top"><p><b>AAMC Faculty Roster</b> (Linear fit of WR PhD graduate growth and imputed WR hiring 1980-1997)</p> </td></tr><tr><td valign="top"><p>C<sub>UTG</sub></p></td><td valign="top"><p>URM Target Growth Constant</p></td><td valign="top"><p>0.0728</p></td><td valign="top"><p><b>FASEB</b> (Author estimation based on exponential fit to URM PhD graduation rate 1980-2013)</p> </td></tr><tr><td valign="top"><p>PHD<sub>WR,Other,0</sub></p></td><td valign="top"><p>Initial WR Non-Faculty PhD Graduates</p></td><td valign="top"><p>3570</p></td><td valign="top"><p><b>FASEB</b> (Author estimation based on number of WR PhD graduates)</p></td></tr><tr><td valign="top"><p>PHD<sub>WR,Other,0</sub></p></td><td valign="top"><p>Initial WR Faculty PhD Graduates</p></td><td valign="top"><p>438</p></td><td valign="top"><p><b>FASEB</b> (Author estimation based on number of WR PhD graduates)</p></td></tr><tr><td valign="top"><p>PHD<sub>WR,Other,0</sub></p></td><td valign="top"><p>Initial URM Non-Faculty PhD Graduates</p></td><td valign="top"><p>84.6</p></td><td valign="top"><p><b>FASEB</b> (Author estimation based on number of URM PhD graduates)</p></td></tr><tr><td valign="top"><p>PHD<sub>WR,Other,0</sub></p></td><td valign="top"><p>Initial URM Faculty PhD Graduates</p></td><td valign="top"><p>25.4</p></td><td valign="top"><p><b>FASEB</b> (Author estimation based on number of URM PhD graduates)</p></td></tr><tr><td valign="top"><p>C<sub>UTR</sub></p></td><td valign="top"><p>URM Transition Rate Constant</p></td><td valign="top"><p>0.0025</p></td><td valign="top"><p><b>AAMC Faculty Roster</b> (Author estimation based on % URM Assistant Professor 2014)</p></td></tr><tr><td valign="top"><p>PD<sub>WR, 0</sub></p></td><td valign="top"><p>Initial WR Candidates on the Market</p></td><td valign="top"><p>511</p></td><td valign="top"><p><b>AAMC Faculty Roster</b> (Imputed Hiring Value)</p></td></tr><tr><td valign="top"><p>PD<sub>URM,0</sub></p></td><td valign="top"><p>Initial URM Candidates on the Market</p></td><td valign="top"><p>19</p></td><td valign="top"><p><b>AAMC Faculty Roster</b> (Imputed Hiring Value)</p></td></tr><tr><td valign="top"><p>S</p></td><td valign="top"><p>Faculty Slots Available per Year</p></td><td valign="top"><p>Step function time series:</p><p><math id="inf14"><mstyle displaystyle="true" scriptlevel="0"><mrow><mi mathvariant="normal">S</mi><mo>=</mo><mrow><mo>{</mo><mrow><mtable columnspacing="1em" rowspacing="4pt"><mtr><mtd><mn>601.11</mn></mtd></mtr><mtr><mtd><mn>1063.67</mn></mtd></mtr></mtable><mtable columnspacing="1em" rowspacing="4pt"><mtr><mtd><mi>t</mi><mo>∈</mo><mrow><mo>[</mo><mrow><mn>0</mn><mo>,</mo><mn>18</mn></mrow><mo>)</mo></mrow></mtd></mtr><mtr><mtd><mi>t</mi><mo>&gt;</mo><mn>18</mn></mtd></mtr></mtable></mrow><mo>}</mo></mrow></mrow></mstyle></math></p></td><td valign="top"><p><b>AAMC Faculty Roster</b> (average of imputed hiring values: 1980-1997; 1998-2013)</p> </td></tr><tr><td valign="top"><p>AP<sub>WR, 0</sub></p></td><td valign="top"><p>Initial WR Assistant Professors</p></td><td valign="top"><p>3246</p></td><td valign="top"><p><b>AAMC Faculty Roster</b></p> </td></tr><tr><td valign="top"><p>AP<sub>URM,0</sub></p></td><td valign="top"><p>Initial URM Assistant Professors</p></td><td valign="top"><p>132</p></td><td valign="top"><p><b>AAMC Faculty Roster</b></p> </td></tr></tbody></table>',
                                                                ),
                                                            'label' => 'Appendix 1—table 2.',
                                                            'doi' => '10.7554/eLife.21393.015',
                                                            'caption' =>
                                                                array (
                                                                    0 =>
                                                                        array (
                                                                            'type' => 'paragraph',
                                                                            'text' => 'Parameters and exogenous variables.',
                                                                        ),
                                                                ),
                                                            'title' => 'Parameters and exogenous variables.',
                                                            'id' => 'AP-tbl2',
                                                        ),
                                                ),
                                            'type' => 'section',
                                            'id' => 's14',
                                        ),
                                ),
                            'id' => 'app1',
                        ),
                ),
            'versionDate' => '2016-12-12T10:21:43Z',
            'pdf' => 'https://publishing-cdn.elifesciences.org/21393/elife-21393-v2.pdf',
            'authorLine' => 'Kenneth D Gibbs Jr et al',
            'type' => 'feature',
            'doi' => '10.7554/eLife.21393',
            'elocationId' => 'e21393',
            'keywords' =>
                array (
                    0 => 'careers in science',
                    1 => 'workforce diversity',
                    2 => 'science policy',
                    3 => 'NIH',
                    4 => 'grad school',
                    5 => 'postdoc',
                ),
            'additionalFiles' =>
                array (
                    0 =>
                        array (
                            'filename' => 'elife-21393-code1-v2.mdl',
                            'label' => 'Source code 1.',
                            'doi' => '10.7554/eLife.21393.013',
                            'mediaType' => 'application/octet-stream',
                            'title' => 'Vensim file containing the final system dynamics model of assistant professor hiring in basic science departments of medical schools.',
                            'uri' => 'https://publishing-cdn.elifesciences.org/21393/elife-21393-code1-v2.mdl',
                            'id' => 'SD6-data',
                        ),
                ),
            'abstract' =>
                array (
                    'content' =>
                        array (
                            0 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => 'Faculty diversity is a longstanding challenge in the US. However, we lack a quantitative and systemic understanding of how the career transitions into assistant professor positions of PhD scientists from underrepresented minority (URM) and well-represented (WR) racial/ethnic backgrounds compare. Between 1980 and 2013, the number of PhD graduates from URM backgrounds increased by a factor of 9.3, compared with a 2.6-fold increase in the number of PhD graduates from WR groups. However, the number of scientists from URM backgrounds hired as assistant professors in medical school basic science departments was not related to the number of potential candidates (R<sup>2</sup>=0.12, p&gt;0.07), whereas there was a strong correlation between these two numbers for scientists from WR backgrounds (R<sup>2</sup>=0.48, p&lt;0.0001). We built and validated a conceptual system dynamics model based on these data that explained 79% of the variance in the hiring of assistant professors and posited no hiring discrimination. Simulations show that, given current transition rates of scientists from URM backgrounds to faculty positions, faculty diversity would not increase significantly through the year 2080 even in the context of an exponential growth in the population of PhD graduates from URM backgrounds, or significant increases in the number of faculty positions. Instead, the simulations showed that diversity increased as more postdoctoral candidates from URM backgrounds transitioned onto the market and were hired.',
                                ),
                        ),
                    'doi' => '10.7554/eLife.21393.001',
                ),
            'status' => 'vor',
            '-patched' => true,
            'references' =>
                array (
                    0 =>
                        array (
                            'type' => 'journal',
                            'volume' => '111',
                            'pmid' => 24733905,
                            'doi' => '10.1073/pnas.1404402111',
                            'articleTitle' => 'Rescuing US biomedical research from its systemic flaws',
                            'date' => '2014',
                            'pages' =>
                                array (
                                    'first' => '5773',
                                    'last' => '5777',
                                    'range' => '5773–5777',
                                ),
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'B Alberts',
                                                    'index' => 'Alberts, B',
                                                ),
                                        ),
                                    1 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'MW Kirschner',
                                                    'index' => 'Kirschner, MW',
                                                ),
                                        ),
                                    2 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'S Tilghman',
                                                    'index' => 'Tilghman, S',
                                                ),
                                        ),
                                    3 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'H Varmus',
                                                    'index' => 'Varmus, H',
                                                ),
                                        ),
                                ),
                            'journal' =>
                                array (
                                    'name' =>
                                        array (
                                            0 => 'PNAS',
                                        ),
                                ),
                            'id' => 'bib1',
                        ),
                    1 =>
                        array (
                            'type' => 'web',
                            'date' => '2016',
                            'uri' => 'http://www.aaup.org/issues/balancing-family-academic-workstopping-tenure-clock',
                            'title' => 'Stopping the tenure clock',
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'group',
                                            'name' => 'American Association of University Professors',
                                        ),
                                ),
                            'id' => 'bib2',
                        ),
                    2 =>
                        array (
                            'type' => 'web',
                            'date' => '2015',
                            'uri' => 'https://services.aamc.org/famous/',
                            'title' => 'Reports: U.S. medical school faculty. 1980 through 2013',
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'group',
                                            'name' => 'Association of American Medical Colleges',
                                        ),
                                ),
                            'id' => 'bib3',
                        ),
                    3 =>
                        array (
                            'type' => 'journal',
                            'volume' => '1',
                            'pmid' => 26601125,
                            'doi' => '10.1126/sciadv.1400005',
                            'articleTitle' => 'Systematic inequality and hierarchy in faculty hiring networks',
                            'date' => '2015',
                            'pages' => 'e1400005',
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'A Clauset',
                                                    'index' => 'Clauset, A',
                                                ),
                                        ),
                                    1 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'S Arbesman',
                                                    'index' => 'Arbesman, S',
                                                ),
                                        ),
                                    2 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'DB Larremore',
                                                    'index' => 'Larremore, DB',
                                                ),
                                        ),
                                ),
                            'journal' =>
                                array (
                                    'name' =>
                                        array (
                                            0 => 'Science Advances',
                                        ),
                                ),
                            'id' => 'bib4',
                        ),
                    4 =>
                        array (
                            'website' => 'New York Times',
                            'type' => 'web',
                            'date' => '2016',
                            'uri' => 'http://kristof.blogs.nytimes.com/2016/08/04/racism-in-the-research-lab/',
                            'title' => 'Racism in the research lab',
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'DA Colon Ramos',
                                                    'index' => 'Colon Ramos, DA',
                                                ),
                                        ),
                                    1 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'A Quiñones-Hinojosa',
                                                    'index' => 'Quiñones-Hinojosa, A',
                                                ),
                                        ),
                                ),
                            'id' => 'bib5',
                        ),
                    5 =>
                        array (
                            'type' => 'web',
                            'date' => '2016',
                            'uri' => 'http://www.thecrimson.com/article/2016/1/28/hms-students-petition-diversity/',
                            'title' => 'Medical students petition faust to increase school’s diversity',
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'AM Duehren',
                                                    'index' => 'Duehren, AM',
                                                ),
                                        ),
                                    1 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'SL Muluk',
                                                    'index' => 'Muluk, SL',
                                                ),
                                        ),
                                ),
                            'id' => 'bib6',
                        ),
                    6 =>
                        array (
                            'type' => 'web',
                            'date' => '2016',
                            'uri' => 'https://cryptogenomicon.org/2015/12/15/our-faculty-search-so-far/',
                            'title' => 'Our faculty search so far',
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'S Eddy',
                                                    'index' => 'Eddy, S',
                                                ),
                                        ),
                                ),
                            'id' => 'bib7',
                        ),
                    7 =>
                        array (
                            'type' => 'journal',
                            'volume' => '103',
                            'pmid' => 21552374,
                            'doi' => '10.1037/a0020743',
                            'articleTitle' => 'Toward a model of social influence that explains minority student integration into the scientific community',
                            'date' => '2011',
                            'pages' =>
                                array (
                                    'first' => '206',
                                    'last' => '222',
                                    'range' => '206–222',
                                ),
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'M Estrada-Hollenbeck',
                                                    'index' => 'Estrada-Hollenbeck, M',
                                                ),
                                        ),
                                    1 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'A Woodcock',
                                                    'index' => 'Woodcock, A',
                                                ),
                                        ),
                                    2 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'PR Hernandez',
                                                    'index' => 'Hernandez, PR',
                                                ),
                                        ),
                                    3 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'PW Schultz',
                                                    'index' => 'Schultz, PW',
                                                ),
                                        ),
                                ),
                            'journal' =>
                                array (
                                    'name' =>
                                        array (
                                            0 => 'Journal of Educational Psychology',
                                        ),
                                ),
                            'id' => 'bib8',
                        ),
                    8 =>
                        array (
                            'type' => 'journal',
                            'volume' => '10',
                            'pmid' => 21885820,
                            'doi' => '10.1187/cbe.11-02-0013',
                            'articleTitle' => 'Improving graduate education to support a branching career pipeline: recommendations based on a survey of doctoral students in the basic biomedical sciences',
                            'date' => '2011',
                            'pages' =>
                                array (
                                    'first' => '239',
                                    'last' => '249',
                                    'range' => '239–249',
                                ),
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'CN Fuhrmann',
                                                    'index' => 'Fuhrmann, CN',
                                                ),
                                        ),
                                    1 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'DG Halme',
                                                    'index' => 'Halme, DG',
                                                ),
                                        ),
                                    2 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'PS O\'Sullivan',
                                                    'index' => 'O\'Sullivan, PS',
                                                ),
                                        ),
                                    3 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'B Lindstaedt',
                                                    'index' => 'Lindstaedt, B',
                                                ),
                                        ),
                                ),
                            'journal' =>
                                array (
                                    'name' =>
                                        array (
                                            0 => 'CBE Life Sciences Education',
                                        ),
                                ),
                            'id' => 'bib9',
                        ),
                    9 =>
                        array (
                            'type' => 'journal',
                            'volume' => '12',
                            'pmid' => 24006384,
                            'doi' => '10.1187/cbe.12-12-0207',
                            'articleTitle' => 'Underrepresentation by race-ethnicity across stages of U.S. science and engineering education',
                            'date' => '2013',
                            'pages' =>
                                array (
                                    'first' => '357',
                                    'last' => '363',
                                    'range' => '357–363',
                                ),
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'H Garrison',
                                                    'index' => 'Garrison, H',
                                                ),
                                        ),
                                ),
                            'journal' =>
                                array (
                                    'name' =>
                                        array (
                                            0 => 'CBE Life Sciences Education',
                                        ),
                                ),
                            'id' => 'bib10',
                        ),
                    10 =>
                        array (
                            'type' => 'web',
                            'date' => '2015',
                            'uri' => 'http://www.faseb.org/Science-Policy-and-Advocacy/Federal-Funding-Data/Education-and-Employment-of-Scientists.aspx',
                            'title' => 'Education and employment of biological and medical scientists',
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'HH Garrison',
                                                    'index' => 'Garrison, HH',
                                                ),
                                        ),
                                    1 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'E Campbell',
                                                    'index' => 'Campbell, E',
                                                ),
                                        ),
                                ),
                            'id' => 'bib11',
                        ),
                    11 =>
                        array (
                            'website' => 'The Washington Post',
                            'type' => 'web',
                            'date' => '2016',
                            'uri' => 'https://www.washingtonpost.com/news/grade-point/wp/2016/09/26/an-ivy-league-professor-on-why-colleges-dont-hire-more-faculty-of-color-we-dont-want-them/?tid=a_inl',
                            'title' => 'An Ivy League professor on why colleges don’t hire more faculty of color: ‘We don’t want them’',
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'M Gasman',
                                                    'index' => 'Gasman, M',
                                                ),
                                        ),
                                ),
                            'id' => 'bib12',
                        ),
                    12 =>
                        array (
                            'type' => 'journal',
                            'volume' => '31',
                            'pmid' => 25368504,
                            'doi' => '10.1002/sres.2190',
                            'articleTitle' => 'Research workforce diversity: The case of balancing national versus international postdocs in US biomedical research',
                            'date' => '2014',
                            'pages' =>
                                array (
                                    'first' => '301',
                                    'last' => '315',
                                    'range' => '301–315',
                                ),
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'N Ghaffarzadegan',
                                                    'index' => 'Ghaffarzadegan, N',
                                                ),
                                        ),
                                    1 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'J Hawley',
                                                    'index' => 'Hawley, J',
                                                ),
                                        ),
                                    2 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'A Desai',
                                                    'index' => 'Desai, A',
                                                ),
                                        ),
                                ),
                            'journal' =>
                                array (
                                    'name' =>
                                        array (
                                            0 => 'Systems Research and Behavioral Science',
                                        ),
                                ),
                            'id' => 'bib13',
                        ),
                    13 =>
                        array (
                            'type' => 'journal',
                            'volume' => '23',
                            'pmid' => 26190914,
                            'doi' => '10.1002/sres.2324',
                            'articleTitle' => 'A note on PhD population growth in biomedical sciences',
                            'date' => '2015',
                            'pages' =>
                                array (
                                    'first' => '402',
                                    'last' => '405',
                                    'range' => '402–405',
                                ),
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'N Ghaffarzadegan',
                                                    'index' => 'Ghaffarzadegan, N',
                                                ),
                                        ),
                                    1 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'J Hawley',
                                                    'index' => 'Hawley, J',
                                                ),
                                        ),
                                    2 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'R Larson',
                                                    'index' => 'Larson, R',
                                                ),
                                        ),
                                    3 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'Y Xue',
                                                    'index' => 'Xue, Y',
                                                ),
                                        ),
                                ),
                            'journal' =>
                                array (
                                    'name' =>
                                        array (
                                            0 => 'Systems Research and Behavioral Science',
                                        ),
                                ),
                            'id' => 'bib14',
                        ),
                    14 =>
                        array (
                            'type' => 'journal',
                            'volume' => '12',
                            'pmid' => 24297297,
                            'doi' => '10.1187/cbe.13-02-0021',
                            'articleTitle' => 'What do I want to be with my PhD? The roles of personal values and structural dynamics in shaping the career interests of recent biomedical science PhD graduates',
                            'date' => '2013',
                            'pages' =>
                                array (
                                    'first' => '711',
                                    'last' => '723',
                                    'range' => '711–723',
                                ),
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'KD Gibbs',
                                                    'index' => 'Gibbs, KD',
                                                ),
                                        ),
                                    1 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'KA Griffin',
                                                    'index' => 'Griffin, KA',
                                                ),
                                        ),
                                ),
                            'journal' =>
                                array (
                                    'name' =>
                                        array (
                                            0 => 'Cell Biology Education',
                                        ),
                                ),
                            'id' => 'bib15',
                        ),
                    15 =>
                        array (
                            'type' => 'journal',
                            'volume' => '9',
                            'pmid' => 25493425,
                            'doi' => '10.1371/journal.pone.0114736',
                            'articleTitle' => 'Biomedical science Ph.D. career interest patterns by race/ethnicity and gender',
                            'date' => '2014',
                            'pages' => 'e114736',
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'KD Gibbs',
                                                    'index' => 'Gibbs, KD',
                                                ),
                                        ),
                                    1 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'J McGready',
                                                    'index' => 'McGready, J',
                                                ),
                                        ),
                                    2 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'JC Bennett',
                                                    'index' => 'Bennett, JC',
                                                ),
                                        ),
                                    3 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'K Griffin',
                                                    'index' => 'Griffin, K',
                                                ),
                                        ),
                                ),
                            'journal' =>
                                array (
                                    'name' =>
                                        array (
                                            0 => 'PLoS ONE',
                                        ),
                                ),
                            'id' => 'bib16',
                        ),
                    16 =>
                        array (
                            'type' => 'journal',
                            'volume' => '14',
                            'pmid' => 26582238,
                            'doi' => '10.1187/cbe.15-03-0075',
                            'articleTitle' => 'Career development among American biomedical postdocs',
                            'date' => '2015',
                            'pages' => 'ar44',
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'KD Gibbs',
                                                    'index' => 'Gibbs, KD',
                                                ),
                                        ),
                                    1 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'J McGready',
                                                    'index' => 'McGready, J',
                                                ),
                                        ),
                                    2 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'K Griffin',
                                                    'index' => 'Griffin, K',
                                                ),
                                        ),
                                ),
                            'journal' =>
                                array (
                                    'name' =>
                                        array (
                                            0 => 'CBE Life Sciences Education',
                                        ),
                                ),
                            'id' => 'bib17',
                        ),
                    17 =>
                        array (
                            'bookTitle' => 'Agent Based Models',
                            'type' => 'book',
                            'publisher' =>
                                array (
                                    'name' =>
                                        array (
                                            0 => 'SAGE Publications',
                                        ),
                                    'address' =>
                                        array (
                                            'components' =>
                                                array (
                                                    'locality' =>
                                                        array (
                                                            0 => 'Los Angeles',
                                                        ),
                                                ),
                                            'formatted' =>
                                                array (
                                                    0 => 'Los Angeles',
                                                ),
                                        ),
                                ),
                            'date' => '2007',
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'N Gilbert',
                                                    'index' => 'Gilbert, N',
                                                ),
                                        ),
                                ),
                            'id' => 'bib18',
                        ),
                    18 =>
                        array (
                            'type' => 'journal',
                            'volume' => '91',
                            'pmid' => 27306969,
                            'doi' => '10.1097/ACM.0000000000001278',
                            'articleTitle' => 'Gender, Race/Ethnicity, and National Institutes of Health R01 Research awards: Is there evidence of a double bind for women of color?',
                            'date' => '2016',
                            'pages' =>
                                array (
                                    'first' => '1098',
                                    'last' => '1107',
                                    'range' => '1098–1107',
                                ),
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'DK Ginther',
                                                    'index' => 'Ginther, DK',
                                                ),
                                        ),
                                    1 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'S Kahn',
                                                    'index' => 'Kahn, S',
                                                ),
                                        ),
                                    2 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'WT Schaffer',
                                                    'index' => 'Schaffer, WT',
                                                ),
                                        ),
                                ),
                            'journal' =>
                                array (
                                    'name' =>
                                        array (
                                            0 => 'Academic Medicine',
                                        ),
                                ),
                            'id' => 'bib19',
                        ),
                    19 =>
                        array (
                            'type' => 'journal',
                            'volume' => '333',
                            'pmid' => 21852498,
                            'doi' => '10.1126/science.1196783',
                            'articleTitle' => 'Race, ethnicity, and NIH research awards',
                            'date' => '2011',
                            'pages' =>
                                array (
                                    'first' => '1015',
                                    'last' => '1019',
                                    'range' => '1015–1019',
                                ),
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'DK Ginther',
                                                    'index' => 'Ginther, DK',
                                                ),
                                        ),
                                    1 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'WT Schaffer',
                                                    'index' => 'Schaffer, WT',
                                                ),
                                        ),
                                    2 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'J Schnell',
                                                    'index' => 'Schnell, J',
                                                ),
                                        ),
                                    3 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'B Masimore',
                                                    'index' => 'Masimore, B',
                                                ),
                                        ),
                                    4 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'F Liu',
                                                    'index' => 'Liu, F',
                                                ),
                                        ),
                                    5 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'LL Haak',
                                                    'index' => 'Haak, LL',
                                                ),
                                        ),
                                    6 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'R Kington',
                                                    'index' => 'Kington, R',
                                                ),
                                        ),
                                ),
                            'journal' =>
                                array (
                                    'name' =>
                                        array (
                                            0 => 'Science',
                                        ),
                                ),
                            'id' => 'bib20',
                        ),
                    20 =>
                        array (
                            'type' => 'web',
                            'date' => '2016',
                            'uri' => 'http://www.people.ku.edu/~dginther/workingpapers/Ginther_etal_Diversity2009.pdf',
                            'title' => 'Diversity in academic biomedicine: An evaluation of education and career outcomes with implications for policy',
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'DK Ginther',
                                                    'index' => 'Ginther, DK',
                                                ),
                                        ),
                                    1 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'WT Schaffer',
                                                    'index' => 'Schaffer, WT',
                                                ),
                                        ),
                                    2 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'J Schnell',
                                                    'index' => 'Schnell, J',
                                                ),
                                        ),
                                    3 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'B Masimore',
                                                    'index' => 'Masimore, B',
                                                ),
                                        ),
                                    4 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'F Liu',
                                                    'index' => 'Liu, F',
                                                ),
                                        ),
                                    5 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'LL Haak',
                                                    'index' => 'Haak, LL',
                                                ),
                                        ),
                                    6 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'RS Kington',
                                                    'index' => 'Kington, RS',
                                                ),
                                        ),
                                ),
                            'id' => 'bib21',
                        ),
                    21 =>
                        array (
                            'type' => 'web',
                            'date' => '2016',
                            'uri' => 'http://higheredtoday.org/2016/02/10/reconsidering-the-pipeline-problem-increasing-faculty-diversity/',
                            'title' => 'Reconsidering the pipeline problem: Increasing faculty diversity higher education today: American council on education',
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'KA Griffin',
                                                    'index' => 'Griffin, KA',
                                                ),
                                        ),
                                ),
                            'id' => 'bib22',
                        ),
                    22 =>
                        array (
                            'type' => 'journal',
                            'volume' => '91',
                            'pmid' => 27224301,
                            'doi' => '10.1097/ACM.0000000000001209',
                            'articleTitle' => 'Measuring diversity of the National Institutes of Health-Funded workforce',
                            'date' => '2016',
                            'pages' =>
                                array (
                                    'first' => '1164',
                                    'last' => '1172',
                                    'range' => '1164–1172',
                                ),
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'ML Heggeness',
                                                    'index' => 'Heggeness, ML',
                                                ),
                                        ),
                                    1 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'L Evans',
                                                    'index' => 'Evans, L',
                                                ),
                                        ),
                                    2 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'JR Pohlhaus',
                                                    'index' => 'Pohlhaus, JR',
                                                ),
                                        ),
                                    3 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'SL Mills',
                                                    'index' => 'Mills, SL',
                                                ),
                                        ),
                                ),
                            'journal' =>
                                array (
                                    'name' =>
                                        array (
                                            0 => 'Academic Medicine',
                                        ),
                                ),
                            'id' => 'bib23',
                        ),
                    23 =>
                        array (
                            'type' => 'journal',
                            'volume' => '96',
                            'pmid' => 16449591,
                            'doi' => '10.2105/AJPH.2005.062059',
                            'articleTitle' => 'System dynamics modeling for public health: background and opportunities',
                            'date' => '2006',
                            'pages' =>
                                array (
                                    'first' => '452',
                                    'last' => '458',
                                    'range' => '452–458',
                                ),
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'JB Homer',
                                                    'index' => 'Homer, JB',
                                                ),
                                        ),
                                    1 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'GB Hirsch',
                                                    'index' => 'Hirsch, GB',
                                                ),
                                        ),
                                ),
                            'journal' =>
                                array (
                                    'name' =>
                                        array (
                                            0 => 'American Journal of Public Health',
                                        ),
                                ),
                            'id' => 'bib24',
                        ),
                    24 =>
                        array (
                            'type' => 'journal',
                            'volume' => '26',
                            'pmid' => 26515973,
                            'doi' => '10.1091/mbc.E15-06-0451',
                            'articleTitle' => 'Surviving as an underrepresented minority scientist in a majority environment',
                            'date' => '2015',
                            'pages' =>
                                array (
                                    'first' => '3692',
                                    'last' => '3696',
                                    'range' => '3692–3696',
                                ),
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'ED Jarvis',
                                                    'index' => 'Jarvis, ED',
                                                ),
                                        ),
                                ),
                            'journal' =>
                                array (
                                    'name' =>
                                        array (
                                            0 => 'Molecular Biology of the Cell',
                                        ),
                                ),
                            'id' => 'bib25',
                        ),
                    25 =>
                        array (
                            'bookTitle' => 'Brief History of NIH Funding: Fact Sheet Washington',
                            'type' => 'book',
                            'publisher' =>
                                array (
                                    'name' =>
                                        array (
                                            0 => 'Congressional Research Service',
                                        ),
                                    'address' =>
                                        array (
                                            'components' =>
                                                array (
                                                    'locality' =>
                                                        array (
                                                            0 => 'DC',
                                                        ),
                                                ),
                                            'formatted' =>
                                                array (
                                                    0 => 'DC',
                                                ),
                                        ),
                                ),
                            'date' => '2013',
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'JA Johnson',
                                                    'index' => 'Johnson, JA',
                                                ),
                                        ),
                                ),
                            'id' => 'bib26',
                        ),
                    26 =>
                        array (
                            'type' => 'journal',
                            'volume' => '4',
                            'pmid' => 23936582,
                            'doi' => '10.1287/serv.1120.0006',
                            'articleTitle' => 'Nonfixed retirement age for university professors: Modeling Its effects on new faculty hires',
                            'date' => '2012',
                            'pages' =>
                                array (
                                    'first' => '69',
                                    'last' => '78',
                                    'range' => '69–78',
                                ),
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'RC Larson',
                                                    'index' => 'Larson, RC',
                                                ),
                                        ),
                                    1 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'MG Diaz',
                                                    'index' => 'Diaz, MG',
                                                ),
                                        ),
                                ),
                            'journal' =>
                                array (
                                    'name' =>
                                        array (
                                            0 => 'Service Science',
                                        ),
                                ),
                            'id' => 'bib27',
                        ),
                    27 =>
                        array (
                            'type' => 'journal',
                            'volume' => '31',
                            'pmid' => 25642132,
                            'doi' => '10.1002/sres.2210',
                            'articleTitle' => 'Too many PhD graduates or too few academic job openings: The basic reproductive number R0 in academia',
                            'date' => '2014',
                            'pages' =>
                                array (
                                    'first' => '745',
                                    'last' => '750',
                                    'range' => '745–750',
                                ),
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'RC Larson',
                                                    'index' => 'Larson, RC',
                                                ),
                                        ),
                                    1 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'N Ghaffarzadegan',
                                                    'index' => 'Ghaffarzadegan, N',
                                                ),
                                        ),
                                    2 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'Y Xue',
                                                    'index' => 'Xue, Y',
                                                ),
                                        ),
                                ),
                            'journal' =>
                                array (
                                    'name' =>
                                        array (
                                            0 => 'Systems Research and Behavioral Science',
                                        ),
                                ),
                            'id' => 'bib28',
                        ),
                    28 =>
                        array (
                            'volume' => '53',
                            'type' => 'journal',
                            'doi' => '10.1177/0002764209356236',
                            'articleTitle' => 'Diversifying science and engineering faculties: Intersections of race, ethnicity, and gender',
                            'date' => '2010',
                            'pages' =>
                                array (
                                    'first' => '1013',
                                    'last' => '1028',
                                    'range' => '1013–1028',
                                ),
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'CB Leggon',
                                                    'index' => 'Leggon, CB',
                                                ),
                                        ),
                                ),
                            'journal' =>
                                array (
                                    'name' =>
                                        array (
                                            0 => 'American Behavioral Scientist',
                                        ),
                                ),
                            'id' => 'bib29',
                        ),
                    29 =>
                        array (
                            'type' => 'journal',
                            'volume' => '3',
                            'pmid' => 25653845,
                            'doi' => '10.12688/f1000research.5878.2',
                            'articleTitle' => 'Shaping the Future of Research: a perspective from junior scientists',
                            'date' => '2014',
                            'pages' => '291',
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'GS McDowell',
                                                    'index' => 'McDowell, GS',
                                                ),
                                        ),
                                    1 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'KT Gunsalus',
                                                    'index' => 'Gunsalus, KT',
                                                ),
                                        ),
                                    2 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'DC MacKellar',
                                                    'index' => 'MacKellar, DC',
                                                ),
                                        ),
                                    3 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'SA Mazzilli',
                                                    'index' => 'Mazzilli, SA',
                                                ),
                                        ),
                                    4 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'VP Pai',
                                                    'index' => 'Pai, VP',
                                                ),
                                        ),
                                    5 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'PR Goodwin',
                                                    'index' => 'Goodwin, PR',
                                                ),
                                        ),
                                    6 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'EM Walsh',
                                                    'index' => 'Walsh, EM',
                                                ),
                                        ),
                                    7 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'A Robinson-Mosher',
                                                    'index' => 'Robinson-Mosher, A',
                                                ),
                                        ),
                                    8 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'TA Bowman',
                                                    'index' => 'Bowman, TA',
                                                ),
                                        ),
                                    9 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'J Kraemer',
                                                    'index' => 'Kraemer, J',
                                                ),
                                        ),
                                    10 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'ML Erb',
                                                    'index' => 'Erb, ML',
                                                ),
                                        ),
                                    11 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'E Schoenfeld',
                                                    'index' => 'Schoenfeld, E',
                                                ),
                                        ),
                                    12 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'L Shokri',
                                                    'index' => 'Shokri, L',
                                                ),
                                        ),
                                    13 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'JD Jackson',
                                                    'index' => 'Jackson, JD',
                                                ),
                                        ),
                                    14 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'A Islam',
                                                    'index' => 'Islam, A',
                                                ),
                                        ),
                                    15 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'MD Mattozzi',
                                                    'index' => 'Mattozzi, MD',
                                                ),
                                        ),
                                    16 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'KA Krukenberg',
                                                    'index' => 'Krukenberg, KA',
                                                ),
                                        ),
                                    17 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'JK Polka',
                                                    'index' => 'Polka, JK',
                                                ),
                                        ),
                                ),
                            'journal' =>
                                array (
                                    'name' =>
                                        array (
                                            0 => 'F1000Research',
                                        ),
                                ),
                            'id' => 'bib30',
                        ),
                    30 =>
                        array (
                            'type' => 'unknown',
                            'details' => 'Thinking in Systems: A Primer Chelsea Green Publishing',
                            'date' => '2008',
                            'title' => 'Thinking in Systems: A Primer Chelsea Green Publishing',
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'DH Meadows',
                                                    'index' => 'Meadows, DH',
                                                ),
                                        ),
                                ),
                            'id' => 'bib31',
                        ),
                    31 =>
                        array (
                            'bookTitle' => 'Faculty Diversity: Problems And Solutions',
                            'type' => 'book',
                            'publisher' =>
                                array (
                                    'name' =>
                                        array (
                                            0 => 'RoutledgeFalmer',
                                        ),
                                    'address' =>
                                        array (
                                            'components' =>
                                                array (
                                                    'locality' =>
                                                        array (
                                                            0 => 'New York',
                                                        ),
                                                ),
                                            'formatted' =>
                                                array (
                                                    0 => 'New York',
                                                ),
                                        ),
                                ),
                            'date' => '2004',
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'J Moody',
                                                    'index' => 'Moody, J',
                                                ),
                                        ),
                                ),
                            'id' => 'bib32',
                        ),
                    32 =>
                        array (
                            'type' => 'journal',
                            'volume' => '87',
                            'pmid' => 23018333,
                            'doi' => '10.1097/ACM.0b013e31826d7189',
                            'articleTitle' => 'Changes in the representation of women and minorities in biomedical careers',
                            'date' => '2012',
                            'pages' =>
                                array (
                                    'first' => '1525',
                                    'last' => '1529',
                                    'range' => '1525–1529',
                                ),
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'SL Myers',
                                                    'index' => 'Myers, SL',
                                                ),
                                        ),
                                    1 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'KH Fealing',
                                                    'index' => 'Fealing, KH',
                                                ),
                                        ),
                                ),
                            'journal' =>
                                array (
                                    'name' =>
                                        array (
                                            0 => 'Academic Medicine',
                                        ),
                                ),
                            'id' => 'bib33',
                        ),
                    33 =>
                        array (
                            'bookTitle' => 'The Postdoctoral Experience Revisited',
                            'type' => 'book',
                            'publisher' =>
                                array (
                                    'name' =>
                                        array (
                                            0 => 'The National Academies Press',
                                        ),
                                    'address' =>
                                        array (
                                            'components' =>
                                                array (
                                                    'locality' =>
                                                        array (
                                                            0 => 'Washington, D.C',
                                                        ),
                                                ),
                                            'formatted' =>
                                                array (
                                                    0 => 'Washington, D.C',
                                                ),
                                        ),
                                ),
                            'date' => '2014',
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'group',
                                            'name' => 'National Academy of Sciences NAoE, and Institute of Medicine',
                                        ),
                                ),
                            'id' => 'bib34',
                        ),
                    34 =>
                        array (
                            'bookTitle' => 'Expanding Underrepresented Minority Participation',
                            'type' => 'book',
                            'publisher' =>
                                array (
                                    'name' =>
                                        array (
                                            0 => 'National Academies Press',
                                        ),
                                    'address' =>
                                        array (
                                            'components' =>
                                                array (
                                                    'locality' =>
                                                        array (
                                                            0 => 'Washington, DC',
                                                        ),
                                                ),
                                            'formatted' =>
                                                array (
                                                    0 => 'Washington, DC',
                                                ),
                                        ),
                                ),
                            'volume' => 'xv',
                            'date' => '2011',
                            'pages' => '269',
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'group',
                                            'name' => 'National Academy of Sciences',
                                        ),
                                ),
                            'id' => 'bib35',
                        ),
                    35 =>
                        array (
                            'type' => 'web',
                            'date' => '2016',
                            'uri' => 'https://publications.nigms.nih.gov/strategicplan/NIGMS-strategic-plan.pdf',
                            'title' => 'National Institute of General Medical Sciences 5-Year Strategic Plan',
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'group',
                                            'name' => 'National Institute of General Medical Sciences',
                                        ),
                                ),
                            'id' => 'bib36',
                        ),
                    36 =>
                        array (
                            'type' => 'web',
                            'date' => '2012',
                            'uri' => 'http://acd.od.nih.gov/biomedical_research_wgreport.pdf',
                            'title' => 'Biomedical Research Workforce Working Group Report',
                            'id' => 'bib37',
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'group',
                                            'name' => 'National Institutes of Health',
                                        ),
                                ),
                            'discriminator' => 'a',
                        ),
                    37 =>
                        array (
                            'type' => 'web',
                            'date' => '2012',
                            'uri' => 'http://acd.od.nih.gov/diversity%20in%20the%20biomedical%20research%20workforce%20report.pdf',
                            'title' => 'Draft Report of the Advisory Committee to the Director Working Group on Diversity in the Biomedical Research Workforce',
                            'id' => 'bib38',
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'group',
                                            'name' => 'National Institutes of Health',
                                        ),
                                ),
                            'discriminator' => 'b',
                        ),
                    38 =>
                        array (
                            'type' => 'web',
                            'date' => '2015',
                            'uri' => 'https://grants.nih.gov/grants/guide/notice-files/NOT-OD-15-053.html',
                            'title' => 'Notice of NIH\'s Interest in Diversity',
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'group',
                                            'name' => 'National Institutes of Health',
                                        ),
                                ),
                            'id' => 'bib39',
                        ),
                    39 =>
                        array (
                            'type' => 'web',
                            'date' => '2016',
                            'uri' => 'https://report.nih.gov/award/index.cfm',
                            'title' => 'Research portfolio online reporting tools (RePORT: NIH awards by location and organization)',
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'group',
                                            'name' => 'National Institutes of Health',
                                        ),
                                ),
                            'id' => 'bib40',
                        ),
                    40 =>
                        array (
                            'bookTitle' => 'Seeking Solutions: Maximizing American Talent by Advancing Women of Color in Academia: Summary of a Conference',
                            'type' => 'book',
                            'publisher' =>
                                array (
                                    'name' =>
                                        array (
                                            0 => 'The National Academies Press',
                                        ),
                                    'address' =>
                                        array (
                                            'components' =>
                                                array (
                                                    'locality' =>
                                                        array (
                                                            0 => 'Washington, D.C',
                                                        ),
                                                ),
                                            'formatted' =>
                                                array (
                                                    0 => 'Washington, D.C',
                                                ),
                                        ),
                                ),
                            'date' => '2013',
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'group',
                                            'name' => 'National Research Council',
                                        ),
                                ),
                            'id' => 'bib41',
                        ),
                    41 =>
                        array (
                            'bookTitle' => 'Science and Engineering Indicators',
                            'type' => 'book',
                            'publisher' =>
                                array (
                                    'name' =>
                                        array (
                                            0 => 'National Science Foundation (NSB 14-01)',
                                        ),
                                    'address' =>
                                        array (
                                            'components' =>
                                                array (
                                                    'locality' =>
                                                        array (
                                                            0 => 'Arlington, VA',
                                                        ),
                                                ),
                                            'formatted' =>
                                                array (
                                                    0 => 'Arlington, VA',
                                                ),
                                        ),
                                ),
                            'date' => '2014',
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'group',
                                            'name' => 'National Science Board',
                                        ),
                                ),
                            'id' => 'bib42',
                        ),
                    42 =>
                        array (
                            'type' => 'web',
                            'date' => '2015',
                            'uri' => 'http://www.nsf.gov/statistics/srvydoctorates/',
                            'title' => 'Survey of earned doctorates',
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'group',
                                            'name' => 'National Science Foundation',
                                        ),
                                ),
                            'id' => 'bib43',
                        ),
                    43 =>
                        array (
                            'type' => 'unknown',
                            'details' => 'Women, Minorities, and Persons with Disabilities in Science and Engineering (NSF 15-311), Arlington, VA',
                            'date' => '2015',
                            'title' => 'Women, Minorities, and Persons with Disabilities in Science and Engineering (NSF 15-311)',
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'group',
                                            'name' => 'National Science Foundation',
                                        ),
                                ),
                            'id' => 'bib44',
                        ),
                    44 =>
                        array (
                            'type' => 'journal',
                            'volume' => '513',
                            'pmid' => 25186866,
                            'doi' => '10.1038/513005a',
                            'articleTitle' => 'There is life after academia',
                            'date' => '2014',
                            'pages' => '5',
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'group',
                                            'name' => 'Nature',
                                        ),
                                ),
                            'journal' =>
                                array (
                                    'name' =>
                                        array (
                                            0 => 'Nature',
                                        ),
                                ),
                            'id' => 'bib45',
                        ),
                    45 =>
                        array (
                            'type' => 'journal',
                            'volume' => '26',
                            'pmid' => 25870234,
                            'doi' => '10.1091/mbc.E14-10-1432',
                            'articleTitle' => 'A call for transparency in tracking student and postdoc career outcomes',
                            'date' => '2015',
                            'pages' =>
                                array (
                                    'first' => '1413',
                                    'last' => '1415',
                                    'range' => '1413–1415',
                                ),
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'JK Polka',
                                                    'index' => 'Polka, JK',
                                                ),
                                        ),
                                    1 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'KA Krukenberg',
                                                    'index' => 'Krukenberg, KA',
                                                ),
                                        ),
                                    2 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'GS McDowell',
                                                    'index' => 'McDowell, GS',
                                                ),
                                        ),
                                ),
                            'journal' =>
                                array (
                                    'name' =>
                                        array (
                                            0 => 'Molecular Biology of the Cell',
                                        ),
                                ),
                            'id' => 'bib46',
                        ),
                    46 =>
                        array (
                            'type' => 'journal',
                            'volume' => '91',
                            'pmid' => 26760060,
                            'doi' => '10.1097/ACM.0000000000001074',
                            'articleTitle' => 'Race-conscious professionalism and African American representation in academic medicine',
                            'date' => '2016',
                            'pages' =>
                                array (
                                    'first' => '913',
                                    'last' => '915',
                                    'range' => '913–915',
                                ),
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'BW Powers',
                                                    'index' => 'Powers, BW',
                                                ),
                                        ),
                                    1 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'AA White',
                                                    'index' => 'White, AA',
                                                ),
                                        ),
                                    2 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'NE Oriol',
                                                    'index' => 'Oriol, NE',
                                                ),
                                        ),
                                    3 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'SH Jain',
                                                    'index' => 'Jain, SH',
                                                ),
                                        ),
                                ),
                            'journal' =>
                                array (
                                    'name' =>
                                        array (
                                            0 => 'Academic Medicine',
                                        ),
                                ),
                            'id' => 'bib47',
                        ),
                    47 =>
                        array (
                            'bookTitle' => 'R: A Language and Environment for Statistical Computing. Vienna',
                            'type' => 'book',
                            'publisher' =>
                                array (
                                    'name' =>
                                        array (
                                            0 => 'R Foundation for Statistical Computing',
                                        ),
                                    'address' =>
                                        array (
                                            'components' =>
                                                array (
                                                    'locality' =>
                                                        array (
                                                            0 => 'Austria',
                                                        ),
                                                ),
                                            'formatted' =>
                                                array (
                                                    0 => 'Austria',
                                                ),
                                        ),
                                ),
                            'uri' => 'https://www.R-project.org/',
                            'date' => '2015',
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'group',
                                            'name' => 'R Core Team',
                                        ),
                                ),
                            'id' => 'bib48',
                        ),
                    48 =>
                        array (
                            'type' => 'journal',
                            'volume' => '7',
                            'pmid' => 22567149,
                            'doi' => '10.1371/journal.pone.0036307',
                            'articleTitle' => 'Science PhD career preferences: levels, changes, and advisor encouragement',
                            'date' => '2012',
                            'pages' => 'e36307',
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'H Sauermann',
                                                    'index' => 'Sauermann, H',
                                                ),
                                        ),
                                    1 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'M Roach',
                                                    'index' => 'Roach, M',
                                                ),
                                        ),
                                ),
                            'journal' =>
                                array (
                                    'name' =>
                                        array (
                                            0 => 'PloS One',
                                        ),
                                ),
                            'id' => 'bib49',
                        ),
                    49 =>
                        array (
                            'type' => 'journal',
                            'volume' => '85',
                            'pmid' => 20505400,
                            'doi' => '10.1097/ACM.0b013e3181dbf75a',
                            'articleTitle' => 'Searching for excellence & diversity: increasing the hiring of women faculty at one academic medical center',
                            'date' => '2010',
                            'pages' =>
                                array (
                                    'first' => '999',
                                    'last' => '1007',
                                    'range' => '999–1007',
                                ),
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'JT Sheridan',
                                                    'index' => 'Sheridan, JT',
                                                ),
                                        ),
                                    1 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'E Fine',
                                                    'index' => 'Fine, E',
                                                ),
                                        ),
                                    2 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'CM Pribbenow',
                                                    'index' => 'Pribbenow, CM',
                                                ),
                                        ),
                                    3 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'J Handelsman',
                                                    'index' => 'Handelsman, J',
                                                ),
                                        ),
                                    4 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'M Carnes',
                                                    'index' => 'Carnes, M',
                                                ),
                                        ),
                                ),
                            'journal' =>
                                array (
                                    'name' =>
                                        array (
                                            0 => 'Academic Medicine',
                                        ),
                                ),
                            'id' => 'bib50',
                        ),
                    50 =>
                        array (
                            'bookTitle' => 'Diversity\'s Promise for Higher Education: Making It Work',
                            'type' => 'book',
                            'publisher' =>
                                array (
                                    'name' =>
                                        array (
                                            0 => 'Johns Hopkins University Press',
                                        ),
                                    'address' =>
                                        array (
                                            'components' =>
                                                array (
                                                    'locality' =>
                                                        array (
                                                            0 => 'Baltimore',
                                                        ),
                                                ),
                                            'formatted' =>
                                                array (
                                                    0 => 'Baltimore',
                                                ),
                                        ),
                                ),
                            'edition' => '2nd Edn',
                            'date' => '2015',
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'DG Smith',
                                                    'index' => 'Smith, DG',
                                                ),
                                        ),
                                ),
                            'id' => 'bib51',
                        ),
                    51 =>
                        array (
                            'type' => 'journal',
                            'volume' => '20',
                            'pmid' => 25045952,
                            'doi' => '10.1037/a0036945',
                            'articleTitle' => 'Giving back or giving up: Native American student experiences in science and engineering',
                            'date' => '2014',
                            'pages' =>
                                array (
                                    'first' => '413',
                                    'last' => '429',
                                    'range' => '413–429',
                                ),
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'JL Smith',
                                                    'index' => 'Smith, JL',
                                                ),
                                        ),
                                    1 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'E Cech',
                                                    'index' => 'Cech, E',
                                                ),
                                        ),
                                    2 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'A Metz',
                                                    'index' => 'Metz, A',
                                                ),
                                        ),
                                    3 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'M Huntoon',
                                                    'index' => 'Huntoon, M',
                                                ),
                                        ),
                                    4 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'C Moyer',
                                                    'index' => 'Moyer, C',
                                                ),
                                        ),
                                ),
                            'journal' =>
                                array (
                                    'name' =>
                                        array (
                                            0 => 'Cultural Diversity and Ethnic Minority Psychology',
                                        ),
                                ),
                            'id' => 'bib52',
                        ),
                    52 =>
                        array (
                            'type' => 'web',
                            'date' => '2016',
                            'uri' => 'https://facultyhandbook.stanford.edu/ch2.html',
                            'title' => 'Faculty handbook, Chapter 2: Appointments, reappointments and promotions in the professoriate',
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'group',
                                            'name' => 'Stanford University',
                                        ),
                                ),
                            'id' => 'bib53',
                        ),
                    53 =>
                        array (
                            'bookTitle' => 'How Economics Shapes Science',
                            'type' => 'book',
                            'publisher' =>
                                array (
                                    'name' =>
                                        array (
                                            0 => 'Harvard University Press',
                                        ),
                                    'address' =>
                                        array (
                                            'components' =>
                                                array (
                                                    'locality' =>
                                                        array (
                                                            0 => 'Cambridge, Massachusetts',
                                                        ),
                                                ),
                                            'formatted' =>
                                                array (
                                                    0 => 'Cambridge, Massachusetts',
                                                ),
                                        ),
                                ),
                            'date' => '2012',
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'P Stephan',
                                                    'index' => 'Stephan, P',
                                                ),
                                        ),
                                ),
                            'id' => 'bib54',
                        ),
                    54 =>
                        array (
                            'type' => 'journal',
                            'volume' => '333',
                            'pmid' => 21852476,
                            'doi' => '10.1126/science.1211704',
                            'articleTitle' => 'Sociology. Weaving a richer tapestry in biomedical science',
                            'date' => '2011',
                            'pages' =>
                                array (
                                    'first' => '940',
                                    'last' => '941',
                                    'range' => '940–941',
                                ),
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'LA Tabak',
                                                    'index' => 'Tabak, LA',
                                                ),
                                        ),
                                    1 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'FS Collins',
                                                    'index' => 'Collins, FS',
                                                ),
                                        ),
                                ),
                            'journal' =>
                                array (
                                    'name' =>
                                        array (
                                            0 => 'Science',
                                        ),
                                ),
                            'id' => 'bib55',
                        ),
                    55 =>
                        array (
                            'type' => 'journal',
                            'volume' => '65',
                            'pmid' => 26834259,
                            'doi' => '10.1093/biosci/biu199',
                            'articleTitle' => 'The role of altruistic values in motivating underrepresented minority students for biomedicine',
                            'date' => '2015',
                            'pages' =>
                                array (
                                    'first' => '183',
                                    'last' => '188',
                                    'range' => '183–188',
                                ),
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'DB Thoman',
                                                    'index' => 'Thoman, DB',
                                                ),
                                        ),
                                    1 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'ER Brown',
                                                    'index' => 'Brown, ER',
                                                ),
                                        ),
                                    2 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'AZ Mason',
                                                    'index' => 'Mason, AZ',
                                                ),
                                        ),
                                    3 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'AG Harmsen',
                                                    'index' => 'Harmsen, AG',
                                                ),
                                        ),
                                    4 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'JL Smith',
                                                    'index' => 'Smith, JL',
                                                ),
                                        ),
                                ),
                            'journal' =>
                                array (
                                    'name' =>
                                        array (
                                            0 => 'Bioscience',
                                        ),
                                ),
                            'id' => 'bib56',
                        ),
                    56 =>
                        array (
                            'bookTitle' => 'Diversifying the Faculty: A Guidebook for Search Committees',
                            'type' => 'book',
                            'publisher' =>
                                array (
                                    'name' =>
                                        array (
                                            0 => 'Association of American Colleges and Universities',
                                        ),
                                    'address' =>
                                        array (
                                            'components' =>
                                                array (
                                                    'locality' =>
                                                        array (
                                                            0 => 'Washington, D.C',
                                                        ),
                                                ),
                                            'formatted' =>
                                                array (
                                                    0 => 'Washington, D.C',
                                                ),
                                        ),
                                ),
                            'date' => '2002',
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'C Turner',
                                                    'index' => 'Turner, C',
                                                ),
                                        ),
                                ),
                            'id' => 'bib57',
                        ),
                    57 =>
                        array (
                            'type' => 'journal',
                            'volume' => '112',
                            'pmid' => 26392553,
                            'doi' => '10.1073/pnas.1515612112',
                            'articleTitle' => 'National Institutes of Health addresses the science of diversity',
                            'date' => '2015',
                            'pages' =>
                                array (
                                    'first' => '12240',
                                    'last' => '12242',
                                    'range' => '12240–12242',
                                ),
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'HA Valantine',
                                                    'index' => 'Valantine, HA',
                                                ),
                                        ),
                                    1 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'FS Collins',
                                                    'index' => 'Collins, FS',
                                                ),
                                        ),
                                ),
                            'journal' =>
                                array (
                                    'name' =>
                                        array (
                                            0 => 'PNAS',
                                        ),
                                ),
                            'id' => 'bib58',
                        ),
                    58 =>
                        array (
                            'volume' => '15',
                            'type' => 'journal',
                            'doi' => '10.1187/cbe.16-03-0138',
                            'articleTitle' => 'From the NIH: A systems approach to increasing the diversity of the biomedical research workforce',
                            'date' => '2016',
                            'pages' => 'fe4',
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'HA Valantine',
                                                    'index' => 'Valantine, HA',
                                                ),
                                        ),
                                    1 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'PK Lund',
                                                    'index' => 'Lund, PK',
                                                ),
                                        ),
                                    2 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'AE Gammie',
                                                    'index' => 'Gammie, AE',
                                                ),
                                        ),
                                ),
                            'journal' =>
                                array (
                                    'name' =>
                                        array (
                                            0 => 'Cell Biology Education',
                                        ),
                                ),
                            'id' => 'bib59',
                        ),
                    59 =>
                        array (
                            'type' => 'web',
                            'date' => '2016',
                            'uri' => 'http://medicine.yale.edu/facultyaffairs/appts/ap_procedures/ladder.aspx',
                            'title' => 'Faculty affairs: ladder faculty',
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'group',
                                            'name' => 'Yale School of Medicine',
                                        ),
                                ),
                            'id' => 'bib60',
                        ),
                    60 =>
                        array (
                            'type' => 'journal',
                            'volume' => '350',
                            'pmid' => 26659054,
                            'doi' => '10.1126/science.aac5949',
                            'articleTitle' => 'Wrapping it up in a person: Examining employment and earnings outcomes for Ph.D. recipients',
                            'date' => '2015',
                            'pages' =>
                                array (
                                    'first' => '1367',
                                    'last' => '1371',
                                    'range' => '1367–1371',
                                ),
                            'authors' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'N Zolas',
                                                    'index' => 'Zolas, N',
                                                ),
                                        ),
                                    1 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'N Goldschlag',
                                                    'index' => 'Goldschlag, N',
                                                ),
                                        ),
                                    2 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'R Jarmin',
                                                    'index' => 'Jarmin, R',
                                                ),
                                        ),
                                    3 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'P Stephan',
                                                    'index' => 'Stephan, P',
                                                ),
                                        ),
                                    4 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'JO Smith',
                                                    'index' => 'Smith, JO',
                                                ),
                                        ),
                                    5 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'RF Rosen',
                                                    'index' => 'Rosen, RF',
                                                ),
                                        ),
                                    6 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'BM Allen',
                                                    'index' => 'Allen, BM',
                                                ),
                                        ),
                                    7 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'BA Weinberg',
                                                    'index' => 'Weinberg, BA',
                                                ),
                                        ),
                                    8 =>
                                        array (
                                            'type' => 'person',
                                            'name' =>
                                                array (
                                                    'preferred' => 'JI Lane',
                                                    'index' => 'Lane, JI',
                                                ),
                                        ),
                                ),
                            'journal' =>
                                array (
                                    'name' =>
                                        array (
                                            0 => 'Science',
                                        ),
                                ),
                            'id' => 'bib61',
                        ),
                ),
            'authorResponse' =>
                array (
                    'content' =>
                        array (
                            0 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => '<i>[…]</i>',
                                ),
                            1 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => '<i>Essential revisions:</i> ',
                                ),
                            2 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => '<i>1) This might be a discipline issue, but I find it confusing that in the body of the paper and in the figures, the data source is not cited! It is only cited in the back as an appendix of sorts. Data sources should be cited throughout the text and at the bottom of each figure.</i> ',
                                ),
                            3 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => 'We have added the following sentence to the main text and to <a href="#fig1">Figure 1</a>: “Data on the populations of PhD graduates and assistant professors in medical school basic science departments were obtained from the National Science Foundation Survey of Earned Doctorates (as compiled by the Federation of American Societies for Experimental Biology, and the AAMC Faculty Roster, respectively (please see Methods section for more information).”',
                                ),
                            4 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => '<i>2) Equation documentation should improve. In your appendix you should use more conventional approaches for model documentation than simple copy-paste of Vensim formula. Also, report all your parameters in a table with proper references (fine if it appears in the Appendix). For model documentation example, see other SD works such as Ghaffarzadegan, Hawley and Desai, 2014.</i> ',
                                ),
                            5 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => 'We have updated equation documentation consistent with the notation used by Ghaffarzadegan et al. (2014). This is now in appendix 1.',
                                ),
                            6 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => '<i>3) Definitions of subgroups need to be more precise. Instead of saying "including[…]" or "(i.e. white)," precise definitions should be clearly articulated within the paper of exactly how subgroups are defined.</i> ',
                                ),
                            7 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => 'We have endeavored to clarify these terms. The Introduction now reads:',
                                ),
                            8 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => '“Scientists from certain underrepresented minority (URM) racial/ethnic backgrounds – specifically, African American/Black, Hispanic/Latin@, American Indian, and Alaska Native – receive 6% of NIH research project grants [Ginther, Kahn and Schaffer, 2016; Ginther et al., 2011; National Institutes of Health, 2012] despite having higher representation in the relevant labor market [Heggeness et al., 2016], and constituting 32% of the US population [National Institutes of Health, 2012].[…] This work focuses on three possible reasons for the low number of scientists from URM backgrounds in the professoriate relative to their peers from well-represented (WR) backgrounds (specifically, White, Asian, and all other non-URM groups) that are amenable to intervention by the scientific community”',
                                ),
                            9 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => 'The Methods now read:',
                                ),
                            10 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => '“To calculate the number of PhD graduates from URM backgrounds, we added together the number of U.S. citizen and permanent resident PhD graduates who identified as one of the following: “Black/African-American (non-Hispanic/Latino),” “Hispanic/Latino,” or “American Indian or Alaska Native” [National Institutes of Health, 2015]. PhD graduates from all non-URM backgrounds (White, Asian or Pacific Islander, “Other,” “Unknown” and non-citizens) were called “well represented” (WR).”',
                                ),
                            11 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => 'We used definitions of “underrepresented minority” and “well-represented” groups consistent with the NIH definitions (<a href="http://grants.nih.gov/grants/guide/notice-files/NOT-OD-15-053.html">http://grants.nih.gov/grants/guide/notice-files/NOT-OD-15-053.html</a>), and conventions in the biomedical training and diversity literature:',
                                ),
                            12 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => '<a href="http://journals.plos.org/plosone/article?id=10.1371/journal.pone.0114736">http://journals.plos.org/plosone/article?id=10.1371/journal.pone.0114736</a>',
                                ),
                            13 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => '<a href="http://www.lifescied.org/content/15/3/ar41.long">http://www.lifescied.org/content/15/3/ar41.long</a>',
                                ),
                            14 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => '<a href="http://www.lifescied.org/content/15/3/ar33.full">http://www.lifescied.org/content/15/3/ar33.full</a>',
                                ),
                            15 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => '<i>4) One of the weaknesses of an SD model is that you are not able to account for individual agents\' behavior, like in agent-based models. Lots of changes in the external environment (e.g. changes in funding streams, policies, and alternative opportunities) have the potential to influence an individual agent\'s actions in ways that are not necessarily linear and not accounted for in the model the authors present.</i> ',
                                ),
                            16 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => 'In general, each modeling methodology has its strengths and weaknesses. System Dynamics (SD) models excel at capturing stocks, flows, nonlinear causal loops, and overall aggregate trends. The nature of our data is that they are aggregated and continuous. Thus, for the questions we aimed to address, specifically assessing the impact at an aggregate level of different intervention strategies on flows of PhDs from URM and WR backgrounds into faculty positions, SD modeling techniques are both adequate and preferred. This approach is standard in this domain; see, e.g., Larson and Diaz (examining the impact of retirement age on faculty hiring: <a href="https://www.ncbi.nlm.nih.gov/pmc/articles/PMC3737001/">https://www.ncbi.nlm.nih.gov/pmc/articles/PMC3737001/</a>), and Ghaffarzadegan and colleagues (examining the impact of different strategies on systems level postdoc diversity: <a href="https://www.ncbi.nlm.nih.gov/pmc/articles/PMC4215734/">https://www.ncbi.nlm.nih.gov/pmc/articles/PMC4215734/</a>). In order to further clarify this point, we have added the additional reference by Larson and Diaz throughout the paper to refer readers to other examples of how SD modeling can be used to address the types of questions posed here.',
                                ),
                            17 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => 'However, we agree with the reviewer that Agent-Based modeling (ABM) is better suited to modeling behavior at the level of the individual. In line with the reviewer’s comments, Bonabeau (2002) notes that ABMs excel when “Individual behavior is nonlinear and can be characterized by thresholds, if-then rules, or nonlinear coupling. Individual behavior exhibits memory, path-dependence, and hysteresis, non-markovian behavior, or temporal correlations, including learning and adaptation. Agent interactions are heterogeneous and can generate network effects.” In the event that we are able to gather data validating the extent to which these heterogeneities lead to systematic sources of error in our results, we hope to use ABM in future work.',
                                ),
                            18 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => '<i>5) While the authors acknowledge the issue of postdocs in the supporting documentation, they do not even mention postdocs in the main paper. The reality is that hardly anyone transitions directly from PhD receipt to an assistant professor position, and the postdoc experience is extremely diverse. What if the differences the authors are seeing here are not a result of stalled entrance into the assistant professor position, but rather stalled entrance into a postdoc that will make the individual attractive for an assistant professor position. This dilemma and absence in their model must, at a minimum, be discussed in the body of the paper. Ideally, the authors would be able to incorporate some assumptions about the postdoc phase into their model.</i> ',
                                ),
                            19 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => 'We thank the referee for pointing out our need for greater clarity, and have modified the main text to more clearly discuss the issue of postdocs. Specifically, we have:',
                                ),
                            20 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => 'Clarified that “candidates on the market” refers primarily to postdocs pursuing faculty positions in medical school basic science departments;',
                                ),
                            21 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => 'Highlighted the fact using the model that includes market drop out (see essential revision #7), the average half-life for “candidates on the market” who are not hired is five years, and that this consistent with the average length of time for postdoctoral study for candidates pursuing faculty positions in research-intensive environments (NIH Biomedical Research Workforce Report, 2012);',
                                ),
                            22 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => 'Added a brief discussion of focusing on postdoctoral transitions into the Discussion section.',
                                ),
                            23 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => 'We too recognize the importance of postdoctoral training in career development of biomedical PhDs (the lead author was previously on the Board of Directors for the National Postdoctoral Association). As has been noted by elsewhere (notably the 2012 NIH Biomedical Workforce Report, and the 2014 National Academies of Sciences report, “The Postdoctoral Experience Revisited”) data quality about postdocs in the United States remains very poor—estimates about their numbers range from 30,000 – 100,000. Thus, we did not feel there was adequate and rigorous data to include postdocs in the model.',
                                ),
                            24 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => 'With respect to question of stalled entrance into postdoc positions by URMs, available data from the NSF (specifically, table 8-3 of the “Women, Minorities and Persons with Disabilities” Report: <a href="https://www.nsf.gov/statistics/2015/nsf15311/tables/pdf/tab8-3-updated-2016-06.pdf">https://www.nsf.gov/statistics/2015/nsf15311/tables/pdf/tab8-3-updated-2016-06.pdf</a>; “Location and type of postgraduate activity for U.S. citizen and permanent resident S&amp;E; doctorate recipients with definite postgraduate plans, by ethnicity and race: 2014”) indicate that rates of postdoctoral transition are largely consistent across URM and WR status.',
                                ),
                            25 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => 'Specifically from 2004-2014 Hispanics were 53.4% of URM PhD graduates, African Americans are 43.3% of URM PhD graduates, and American Indian Alaska/Natives are 3.3% of URM PhD graduates. Using the NSF rates of postdoctoral study, we see that 41.5% of URM PhD graduates have definitive plans to progress to postdoctoral study post PhD (41.5% URM postdoc transition rate =0.534*(46.7% Hispanic postdoc rate) + 0.433*(35.7% African American postdoc rate) + 0.033 (33.3% American Indian/Alaska Native postdoc rate)).',
                                ),
                            26 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => 'Among WR groups, from 2004-2014, Whites were 55.6% of WR PhD graduates, Asians were 9.6% of WR graduates and “Other” ethnicities are 34.8% of WR PhD graduates. Using the NSF rates of postdoctoral study, we see that 42.6% of WR PhD graduates have definitive plans to progress to postdoctoral study (42.6% WR postdoc transition rate = 0.556*(41.7% White postdoc transition rate) + 0.096*(33.9% Asian postdoc transition rate) + 0.348*(44.7% Other” postdoc transition rate). We have added the following sentence to the manuscript when describing the model:',
                                ),
                            27 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => '“Candidates on the market are composed primarily of the subset of postdoctoral scientists pursuing faculty careers in medical school basic science departments, and current evidence suggests that the rates of transition to postdoctoral training are comparable between URM and WR PhD graduates [Smith, 2015]”.',
                                ),
                            28 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => '<i>6) The authors have no data on who is applying for assistant professor positions (as they acknowledge in the third paragraph of the Discussion). Therefore, there is no way to really claim, as they do, that if institutions increased their efforts to hire more URM, this would increase diversity in the assistant professor pool.</i> ',
                                ),
                            29 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => 'We agree with the reviewer that systematic data regarding the demographics of faculty applicants would be ideal. However, these data are not available, which we acknowledge in the manuscript, “systematic data are not available on the demographics of faculty applicants.” However, it is established in the higher education and faculty development literature that increasing diversity in the applicant pool is a proven strategy to increase diversity in the professoriate (C. Turner, Diversifying the Faculty: A Guidebook for Search Committees, 2002; J. Moody, Faculty Diversity: Problems and Solutions, 2004; D. Smith, Diversity’s Promise for Higher Education: Making it Work, 2015).',
                                ),
                            30 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => 'These data are not likely to become available for many reasons, including confidentiality and legal restrictions (two examples of university HR policies regarding privacy are presented below):',
                                ),
                            31 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => '<a href="http://hr.unc.edu/policies-procedures-systems/spa-employee-policies/personnel-information/personnel-records-and-confidentiality-of-personnel-information/">http://hr.unc.edu/policies-procedures-systems/spa-employee-policies/personnel-information/personnel-records-and-confidentiality-of-personnel-information/</a>',
                                ),
                            32 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => '<a href="https://hr.uoregon.edu/records/classified-employee-records-and-data">https://hr.uoregon.edu/records/classified-employee-records-and-data</a>',
                                ),
                            33 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => 'Furthermore, Gibbs et al. 2014 demonstrated that URMs have lower interest in faculty positions at research-intensive universities (like medical schools) in comparison to their WR colleagues. In addition to the authors’ personal experiences (as one who works professionally in the area of workforce diversity, a very common reason given for the lack of faculty diversity is the lack of applicants), the lack of diversity in a recent applicant pool was emphasized and substantiated by a search committee chair at Harvard: <a href="http://www.nature.com/news/insider-s-view-of-faculty-search-kicks-off-discussion-online-1.19165">http://www.nature.com/news/insider-s-view-of-faculty-search-kicks-off-discussion-online-1.19165</a>). Therefore, we feel that it is appropriate to highlight the need to increase applications from URM scientists as a means of enhancing diversity. We have endeavored to clarify this logic in the manuscript and have added the additional references by Moody and Smith (Introduction, sixth paragraph).',
                                ),
                            34 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => '<i>7) In the main model there is no drop-out from the pool of people in the market (that is, people stay in the market forever). I see that in your sensitivity analysis you report that you have conducted an analysis of effect of drop-out from the pool of people in the market. Very good, but I would argue that this should be in the main model. You simulate the model until 2080, and by then the whole population has retired and many have died! So, simply replace the results of your sensitivity analysis as the main analysis. I understand that this might not affect the results, but it is a better modeling practice.</i> ',
                                ),
                            35 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => 'We have replaced the current model to incorporate market drop out and have updated the figures, figure legends, and text appropriately.',
                                ),
                            36 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => '<i>8) The simulation period of 55 years in future is simply too long. And the assumption that 73% of PhD graduates will be URM feels unrealistic unless you provide evidence (if 73% of a population are minorities, then they are ORM: over-represented minorities!). I suggest the authors to simulate for the next 1-2 decades; there are many things that can happen until 2080 which your model cannot predict and are out of the boundary of your analysis.</i> ',
                                ),
                            37 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => 'Per the reviewer’s suggestion, we have included a model run ending in 2030.',
                                ),
                            38 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => 'We have kept a longer model run in (through 2080) to illuminate for readers how given a “best case scenario” of a limitless URM talent pool and no discrimination, the current structure would not achieve increased faculty diversity unless there is also an increased transition rate. We have acknowledged in the text that there are many things that are likely to change that would impact long-term predictive capability of the model (see Discussion, second paragraph).',
                                ),
                            39 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => '<i>9) One may argue that the reason "URM Faculty Aspire P0" is much smaller than the "WR Faculty Aspire P0" is that you are assuming that hiring in faculty positions is proportional to population of the pools. URM might be weaker in the market or be discriminated. From a modeling standpoint, your model has two degrees of freedom, if you assume there is no "weight" toward hiring WR relative to URM, you end up with much higher "WR Faculty Aspire P0" anyway. I think the best way, but difficult, is to provide some references for this argument (that there is less faculty aspiration among URM). The easier way is to clarify that you are aware of this assumption and discuss its implications in your policy recommendation. You may need to modify your language throughout the paper too.</i> ',
                                ),
                            40 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => 'Two previous papers by the lead author provide evidence of lower interest in faculty careers at major research universities among scientists from URM backgrounds:',
                                ),
                            41 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => 'Gibbs et al., “Biomedical Science PhD Career Interest Patterns by Race/Ethnicity and Gender,” PLOS ONE 2014(PMID: 25493425; reference 24) demonstrated that at PhD completion, the URM men and URM women have lower interest than their WR counterparts in faculty positions at research-intensive universities, even when controlling for career pathway interest at PhD entry, first-author publication rate, faculty support, research self-efficacy, and graduate training experiences.',
                                ),
                            42 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => 'Gibbs et al., “Career Development of American Biomedical Postdocs,” CBE Life Sciences Education 2015(PMID: 26582238; reference 22), showed that in a cross section of American postdocs, URM women had the lowest interest in faculty positions at research-intensive universities of all groups, even when accounting for career pathway interest at PhD entry, first-author publication rate, faculty support, research self-efficacy, and graduate training experiences.',
                                ),
                            43 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => 'Therefore, there is evidence that apart from level of preparation, URMs have lower level of interest in faculty positions at research-intensive universities. We have highlighted these references more clearly in the manuscript (Introduction, fifth paragraph; subsection “Intervention Strategies to Increasing Assistant Professor Diversity”).',
                                ),
                            44 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => 'The P0 values were based on imputed hiring trends for scientists from URM and WR backgrounds from 1980-1997. That is, we assumed what happened historically with URM and WR faculty hiring would carry forward as the system grew. We have clarified this in the text.',
                                ),
                            45 =>
                                array (
                                    'type' => 'paragraph',
                                    'text' => 'We do make the conservative assumption of no discrimination. We do recognize that discrimination can remain a problem in academic hiring. However, we did not include this in the model because we were unaware of high quality, systemic evidence that could be used to quantify its impact. We have noted in the revised manuscript (subsection “Intervention Strategies to Increasing Assistant Professor Diversity”) that discrimination will further attenuate efforts to enhance faculty diversity. The goal of the model was to highlight to readers that even in the absence of discrimination, increasing faculty diversity will remain a challenge unless there is greater attention to enhancing post PhD (i.e. postdoctoral) transitions onto the market and their subsequent hiring. We thank the reviewer for helping us to clarify this point.',
                                ),
                        ),
                    'doi' => '10.7554/eLife.21393.018',
                ),
            'version' => 2,
            'copyright' =>
                array (
                    'license' => 'CC0-1.0',
                    'statement' => 'This is an open-access article, free of all copyright, and may be freely reproduced, distributed, transmitted, modified, built upon, or otherwise used by anyone for any lawful purpose. The work is made available under the Creative Commons CC0 public domain dedication.',
                ),
            'researchOrganisms' =>
                array (
                    0 => 'None',
                ),
            'title' => 'Decoupling of the minority PhD talent pool and assistant professor hiring in medical school basic science departments in the US',
            'acknowledgements' =>
                array (
                    0 =>
                        array (
                            'type' => 'paragraph',
                            'text' => 'The authors thank Andrew Miklos and Dorit Zuk for presubmission review and comments, and Malika Fair for helpful conversations.',
                        ),
                ),
            'stage' => 'published',
        );
    }

    /**
     * @test
     */
    public function it_is_a_normalizer()
    {
        $this->assertInstanceOf(NormalizerInterface::class, $this->normalizer);
    }

    /**
     * @test
     * @dataProvider canNormalizeProvider
     */
    public function it_can_normalize_article_poas($data, $format, bool $expected)
    {
        $this->assertSame($expected, $this->normalizer->supportsNormalization($data, $format));
    }

    public function canNormalizeProvider() : array
    {
        $articlePoA = Builder::for(ArticlePoA::class)->__invoke();

        return [
            'article poa' => [$articlePoA, null, true],
            'article poa with format' => [$articlePoA, 'foo', true],
            'non-article poa' => [$this, null, false],
        ];
    }

    /**
     * @test
     * @dataProvider normalizeProvider
     */
    public function it_normalize_article_poas(ArticlePoA $articlePoA, array $context, array $expected)
    {
        $this->assertSame($expected, $this->normalizer->normalize($articlePoA, null, $context));
    }

    /**
     * @test
     */
    public function it_is_a_denormalizer()
    {
        $this->assertInstanceOf(DenormalizerInterface::class, $this->normalizer);
    }

    /**
     * @test
     * @dataProvider canDenormalizeProvider
     */
    public function it_can_denormalize_article_poas($data, $format, array $context, bool $expected)
    {
        $this->assertSame($expected, $this->normalizer->supportsDenormalization($data, $format, $context));
    }

    public function canDenormalizeProvider() : array
    {
        return [
            'article poa' => [[], ArticlePoA::class, [], true],
            'article poa by article type' => [['type' => 'research-article', 'status' => 'poa'], Article::class, [], true],
            'article poa by model type' => [['type' => 'research-article', 'status' => 'poa'], Model::class, [], true],
            'non-article poa' => [[], get_class($this), [], false],
        ];
    }

    /**
     * @test
     * @dataProvider normalizeProvider
     */
    public function it_denormalize_article_poas(
        ArticlePoA $expected,
        array $context,
        array $json,
        callable $extra = null
    ) {
        if ($extra) {
            call_user_func($extra, $this);
        }

        $actual = $this->normalizer->denormalize($json, ArticlePoA::class, null, $context);

        $this->mockSubjectCall('subject1');

        $this->assertObjectsAreEqual($expected, $actual);
    }

    public function normalizeProvider() : array
    {
        return [
            'complete' => [
                Builder::for(ArticlePoA::class)
                    ->withTitlePrefix('title prefix')
                    ->withPdf('http://www.example.com/')
                    ->withSubjects(new ArraySequence([
                        Builder::for(Subject::class)
                            ->withId('subject1')
                            ->__invoke(),
                    ]))
                    ->withResearchOrganisms(['research organism'])
                    ->__invoke(),
                [],
                [
                    'id' => '14107',
                    'stage' => 'published',
                    'version' => 1,
                    'type' => 'research-article',
                    'doi' => '10.7554/eLife.14107',
                    'title' => 'Molecular basis for multimerization in the activation of the epidermal growth factor',
                    'volume' => 5,
                    'elocationId' => 'e14107',
                    'published' => '2016-03-28T00:00:00Z',
                    'versionDate' => '2016-03-28T00:00:00Z',
                    'statusDate' => '2016-03-28T00:00:00Z',
                    'titlePrefix' => 'title prefix',
                    'authorLine' => 'Yongjian Huang et al',
                    'pdf' => 'http://www.example.com/',
                    'subjects' => [
                        ['id' => 'subject1', 'name' => 'Subject 1'],
                    ],
                    'researchOrganisms' => ['research organism'],
                    'copyright' => [
                        'license' => 'CC-BY-4.0',
                        'statement' => 'Statement',
                        'holder' => 'Author et al',
                    ],
                    'authors' => [
                        [
                            'type' => 'person',
                            'name' => [
                                'preferred' => 'Author',
                                'index' => 'Author',
                            ],
                        ],
                    ],
                    'reviewers' => [
                        [
                            'name' => [
                                'preferred' => 'Reviewer',
                                'index' => 'Reviewer',
                            ],
                            'role' => 'Role',
                        ],
                    ],
                    'issue' => 1,
                    'abstract' => [
                        'content' => [
                            [
                                'type' => 'paragraph',
                                'text' => 'Article 14107 abstract text',
                            ],
                        ],
                    ],
                    'funding' => [
                        'awards' => [
                            [
                                'id' => 'award',
                                'source' => [
                                    'name' => [
                                        'Funder',
                                    ],
                                    'funderId' => '10.13039/501100001659',
                                ],
                                'recipients' => [
                                    [
                                        'type' => 'person',
                                        'name' => [
                                            'preferred' => 'Author',
                                            'index' => 'Author',
                                        ],
                                    ],
                                ],
                                'awardId' => 'awardId',
                            ],
                        ],
                        'statement' => 'Funding statement',
                    ],
                    'dataSets' => [
                        'generated' => [
                            [
                                'id' => 'id',
                                'date' => '2000-01-02',
                                'authors' => [
                                    [
                                        'type' => 'person',
                                        'name' => [
                                            'preferred' => 'preferred name',
                                            'index' => 'index name',
                                        ],
                                    ],
                                ],
                                'title' => 'title',
                                'authorsEtAl' => true,
                                'dataId' => 'data id',
                                'details' => 'details',
                                'doi' => '10.1000/182',
                                'uri' => 'https://doi.org/10.1000/182',
                            ],
                        ],
                        'used' => [
                            [
                                'id' => 'id',
                                'date' => '2000',
                                'authors' => [
                                    [
                                        'type' => 'person',
                                        'name' => [
                                            'preferred' => 'preferred name',
                                            'index' => 'index name',
                                        ],
                                    ],
                                ],
                                'title' => 'title',
                                'uri' => 'http://www.example.com/',
                            ],
                        ],
                    ],
                    'additionalFiles' => [
                        [
                            'mediaType' => 'image/jpeg',
                            'uri' => 'https://placehold.it/900x450',
                            'filename' => 'image.jpeg',
                            'id' => 'file1',
                            'title' => 'Additional file 1',
                        ],
                    ],
                    'status' => 'poa',
                ],
                function ($test) {
                    $test->mockSubjectCall('genomics-evolutionary-biology', true);
                    $test->mockArticleCall('09560', true, $vor = true, 1);
                    $test->mockArticleCall('14107', true, false, 1);
                },
            ],
            'minimum' => [
                Builder::for(ArticlePoA::class)
                    ->withStage(ArticlePoA::STAGE_PREVIEW)
                    ->withPublished(null)
                    ->withVersionDate(null)
                    ->withStatusDate(null)
                    ->withAuthorLine(null)
                    ->withSequenceOfAuthors()
                    ->withPromiseOfCopyright(new Copyright('license', 'statement'))
                    ->withPromiseOfIssue(null)
                    ->withSequenceOfReviewers()
                    ->withPromiseOfAbstract(null)
                    ->withPromiseOfFunding(null)
                    ->withSequenceOfGeneratedDataSets()
                    ->withSequenceOfUsedDataSets()
                    ->withSequenceOfAdditionalFiles()
                    ->__invoke(),
                [],
                [
                    'id' => '14107',
                    'stage' => 'preview',
                    'version' => 1,
                    'type' => 'research-article',
                    'doi' => '10.7554/eLife.14107',
                    'title' => 'Molecular basis for multimerization in the activation of the epidermal growth factor',
                    'volume' => 5,
                    'elocationId' => 'e14107',
                    'copyright' => [
                        'license' => 'license',
                        'statement' => 'statement',
                    ],
                    'status' => 'poa',
                ],
            ],
            'complete snippet' => [
                Builder::for(ArticlePoA::class)
                    ->withTitlePrefix('title prefix')
                    ->withPdf('http://www.example.com/')
                    ->withSubjects(new ArraySequence([
                        Builder::for(Subject::class)
                            ->withId('subject1')
                            ->__invoke(),
                    ]))
                    ->withResearchOrganisms(['research organism'])
                    ->__invoke(),
                ['snippet' => true],
                [
                    'id' => '14107',
                    'stage' => 'published',
                    'version' => 1,
                    'type' => 'research-article',
                    'doi' => '10.7554/eLife.14107',
                    'title' => 'Molecular basis for multimerization in the activation of the epidermal growth factor',
                    'volume' => 5,
                    'elocationId' => 'e14107',
                    'published' => '2016-03-28T00:00:00Z',
                    'versionDate' => '2016-03-28T00:00:00Z',
                    'statusDate' => '2016-03-28T00:00:00Z',
                    'titlePrefix' => 'title prefix',
                    'authorLine' => 'Yongjian Huang et al',
                    'pdf' => 'http://www.example.com/',
                    'subjects' => [
                        ['id' => 'subject1', 'name' => 'Subject 1'],
                    ],
                    'researchOrganisms' => ['research organism'],
                    'status' => 'poa',
                ],
                function (ApiTestCase $test) {
                    $test->mockArticleCall('14107', true, false, 1);
                },
            ],
            'minimum snippet' => [
                Builder::for(ArticlePoA::class)
                    ->withStage(ArticlePoA::STAGE_PREVIEW)
                    ->withPublished(null)
                    ->withVersionDate(null)
                    ->withStatusDate(null)
                    ->withAuthorLine(null)
                    ->withPromiseOfIssue(null)
                    ->withSequenceOfReviewers()
                    ->withPromiseOfAbstract(null)
                    ->withPromiseOfFunding(null)
                    ->withSequenceOfGeneratedDataSets()
                    ->withSequenceOfUsedDataSets()
                    ->withSequenceOfAdditionalFiles()
                    ->__invoke(),
                ['snippet' => true],
                [
                    'id' => '14107',
                    'stage' => 'preview',
                    'version' => 1,
                    'type' => 'research-article',
                    'doi' => '10.7554/eLife.14107',
                    'title' => 'Molecular basis for multimerization in the activation of the epidermal growth factor',
                    'volume' => 5,
                    'elocationId' => 'e14107',
                    'status' => 'poa',
                ],
                function (ApiTestCase $test) {
                    $test->mockArticleCall('14107', false, false, 1);
                },
            ],
        ];
    }
}
